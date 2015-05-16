<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_products extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->model('categories_model');
        $this->load->helper('date');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }
	public function index()
	{
		$data['title'] = "Admin Panel - Products";
		$data['products'] = $this->products_model->getAllProducts2();
		//fetch sql data into arrays
        $data['categories'] = $this->categories_model->getCategories();

		$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js');
        $data['custom_scripts'] = 'backend/common/datatable_scripts';
		$data['main_content'] = 'backend/pages/products/list';
        $this->load->view('backend/templates/template', $data);


	}
	public function datatable()
    {
    	$data1 = array();
    	$data1 = $this->products_model->getAllProducts();
    	$results = array(
    	//"draw" => 1,
        "data"=>$data1,
        "recordsTotal" => count($data1),
        "recordsFiltered" => count($data1),
          );

    	header('Content-type: application/json');
        echo json_encode($results);
    }

	public function doupload($name){
			$config['upload_path'] = './upload/book-covers/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '900';
            $config['max_width'] = '1024';
            $config['max_height'] = '1024';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload($name)) {
                //echo 'Upload Ok';
                $check = $this->upload->data();
                /*echo "<pre>";
                print_r($check);
                echo "</pre>";*/
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
    			$config['source_image'] = './upload/book-covers/'.$check['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']     = 140;
                $config['height']   = 212;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
            }
            else {
                $data['errors'] = $this->upload->display_errors();
                //$this->load->view("upload_view", $data);
            }
            return $check;
	}


	public function add()
    {
    	$data['specific_scripts'] = array('ckeditor/ckeditor.js');
    	//if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

        	$now = date('Y-m-d H:i:s');
            if (isset($_POST['image'])) {
                $img_name = $this->doupload('image');
                $img = $img_name['file_name'];
                $img_thumb = $img_name['raw_name'].'_thumb'.$img_name['file_ext'];
            } else {

                $img = "";
                $img_thumb = "";
            }
            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('desc', 'description', 'required');
            $this->form_validation->set_rules('cost_price', 'cost_price', 'required|numeric');
            $this->form_validation->set_rules('cat', 'category id', 'required');
            $this->form_validation->set_rules('author', 'author', 'required');
            $this->form_validation->set_rules('stock', 'stock', 'required|numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if($this->form_validation->run()){
        	$data_to_insert = array(
        			'name' => $this->input->post('name'),
        			'name_en' => $this->input->post('name_en'),
                    'description' => $this->input->post('desc'),
                    'description_en' => $this->input->post('desc_en'),
                    'image' => $img,
                    'image_thumb' => $img_thumb,
                    'cost_price' => $this->input->post('cost_price'),
                    'sell_price' => $this->input->post('sell_price'),
                    'author'  =>  $this->input->post('author'),
                    'category_id' => $this->input->post('cat'),
                    'stock' => $this->input->post('stock'),
                    'created_on' => $now,
                    'status' => $this->input->post('status') ? 1 : 0,
                );
        	if($this->products_model->insert_product($data_to_insert)){
        		$data['flash_message'] = TRUE;
            }else{
                $data['flash_message'] = FALSE;
                }
            }
        }
    	$data['title'] = "Products - Add";
    	$data['categories'] = $this->categories_model->getCategories();
        //load the view
        $data['main_content'] = 'backend/pages/products/add';
        $this->load->view('backend/templates/template', $data);
    }
    public function update()
    {
    	$data['specific_scripts'] = array('ckeditor/ckeditor.js');
        //product id
        $id = $this->uri->segment(4);
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $now = date('Y-m-d H:i:s');

            if (isset($_POST['image'])) {
                $img_name = $this->doupload('image');
                $img = $img_name['file_name'];
                $img_thumb = $img_name['raw_name'].'_thumb'.$img_name['file_ext'];
            } else {

                $img = $this->input->post('image_link');
                $img_thumb = $this->input->post('image_thumb_link');
            }

            $data_update = array(
                    'name' => $this->input->post('name'),
                    'name_en' => $this->input->post('name_en'),
                    'description' => $this->input->post('desc'),
                    'description_en' => $this->input->post('desc_en'),
                    'image' => $img,
                    'image_thumb' => $img_thumb,
                    'cost_price' => $this->input->post('cost_price'),
                    'sell_price' => $this->input->post('sell_price'),
                    'author'  =>  $this->input->post('author'),
                    'category_id' => $this->input->post('cat'),
                    'stock' => $this->input->post('stock'),
                    'updated_on' => $now,
                    'status' => $this->input->post('status') ? 1 : 0,
                );
            if($this->products_model->update_product($id,$data_update))
            {
                $this->session->set_flashdata('flash_message', 'updated');
            }else{
                $this->session->set_flashdata('flash_message', 'not_updated');
            }
            redirect('admin/products/update/'.$id.'');
        }

    	$data['title'] = "Products - Update";
    	$data['products'] = $this->products_model->getProductById($id);
    	$data['categories'] = $this->categories_model->getCategories();
        //load the view
        $data['main_content'] = 'backend/pages/products/edit';
        $this->load->view('backend/templates/template', $data);
    }
    public function delete()
    {
        //product id
        $id = $this->uri->segment(4);
        $this->products_model->delete_product($id);
        redirect('admin/products');
    }
}

