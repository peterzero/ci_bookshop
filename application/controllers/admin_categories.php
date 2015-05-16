<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_categories extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
        $this->load->model('categories_model');

    }
	public function index()
	{
		$data['title'] = "Categories - Admin Panel";

		//$data['categories'] = $this->categories_model->getCategories();
        $data['categories'] = $this->recursive(0, $this->categories_model->getCategories(),'', 'view');
		$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js','ckeditor.js');
		$data['custom_scripts'] = 'backend/common/datatable_scripts';
        $data['main_content'] = 'backend/pages/categories/list';
        $this->load->view('backend/templates/template', $data);
	}

	public function add()
    {
    	//if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

        	$now = date('Y-m-d H:i:s');

            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('parent_id', 'parent id', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if($this->form_validation->run()){
        	$data_to_insert = array(
        			'name' => $this->input->post('name'),
        			'name_en' => $this->input->post('name_en'),
                    'description' => $this->input->post('desc'),
                    'description_en' => $this->input->post('desc_en'),
                    'parent_id' => $this->input->post('parent_id'),
                    'created_on' => $now,
                    'status' => $this->input->post('status') ? 1 : 0,
                );
        	if($this->categories_model->insert_category($data_to_insert))
            {
        		$this->session->set_flashdata('flash_message', array(
                        'type' => 'success',
                        'message' => 'Thêm danh mục '.$this->input->post('name').' thành công',
                    ));
            }else{
                $this->session->set_flashdata('flash_message', array(
                        'type' => 'error',
                        'message' => 'Thêm danh mục '.$this->input->post('name').' thất bại',
                    ));
            }
            redirect('admin/categories');
            }
        }
    	$data['title'] = "Categories - Add";
        $data['categories'] = $this->dropdown('-Root Category-',$this->recursive(0, $this->categories_model->getCategories(),'', 'dropdown'));
        //load the view
        $data['main_content'] = 'backend/pages/categories/add';
        $this->load->view('backend/templates/template', $data);
    }

    /**
     * [recursive description]
     * @param  integer $parentid [description]
     * @param  array  $data     [description]
     * @param  string  $step     [description]
     * @param  string  $type     [description]
     * @return array            [description]
     */
    public function recursive($parentid = 0, $data = NULL, $step = '', $type = 'dropdown')
    {
        if (isset($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                if($value['parent_id'] == $parentid){
                    if($type == 'dropdown'){
                        $this->recursive[$value['id']] = $step.' '.$value['name'];
                    }
                    else if($type = 'view'){
                        $value['name'] = $step.' '.$value['name'];
                        $this->recursive[$value['id']] = $value;
                    }

                    $this->recursive($value['id'], $data, $step.'--',$type);
                }
            }
            return $this->recursive;
        }

    }

    /**
     * [dropdown description]
     * @param  string $default [description]
     * @param  array $data    [description]
     * @return array          [description]
     */
    public function dropdown($default = '', $data = NULL)
    {
        $temp[0] = $default;
        if(isset($data) && is_array($data))
        {
            foreach ($data as $key => $val) {
                $temp[$key] = $val;
            }
        }
        return $temp;
    }

    public function _catalogue($parentid = 0, $id = 0){
        $parentid = (int)$parentid;
        $id = (int)$id;
        if($parentid == $id){
            $this->form_validation->set_message('_catalogue', 'Không được chọn chính nó làm cha!');
            return FALSE;
        }

        /*$children = $this->nestedset->children(array('id' => $id));
        if(isset($children) && is_array($children) && in_array($parentid, $children)){
            $this->form_validation->set_message('_catalogue', 'Không được chọn danh mục làm cha!');
            return FALSE;
        }*/
    }

    public function update()
    {
        //cate id
        $id = $this->uri->segment(4);
        $data['categories'] = $this->categories_model->getCategoryID($id);
        $data['specific_scripts'] = array('ckeditor/ckeditor.js');
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $now = date('Y-m-d H:i:s');
            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('parent_id', 'parent id', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if($this->form_validation->run()){
            $data_update = array(
                    'name' => $this->input->post('name'),
        			'name_en' => $this->input->post('name_en'),
                    'description' => $this->input->post('desc'),
                    'description_en' => $this->input->post('desc_en'),
                    'parent_id' => $this->input->post('parent_id'),
                    'updated_on' => $now,
                    'status' => $this->input->post('status') ? 1 : 0,
                );
            if($this->categories_model->update_category($id,$data_update))
            {
                $this->session->set_flashdata('flash_message', array(
                        'type' => 'success',
                        'message' => 'Thay đổi danh mục '.$this->input->post('name').' thành công',
                    ));
            }else{
                $this->session->set_flashdata('flash_message', array(
                        'type' => 'error',
                        'message' => 'Thay đổi danh mục '.$this->input->post('name').' thất bại',
                    ));
            }
            redirect('admin/categories');
        }
        }

    	$data['title'] = "Categories - Update";

    	$data['cat_parent'] = $this->dropdown('Root Category',$this->recursive(0, $this->categories_model->getCategories(),'', 'dropdown'));
        //load the view
        $data['main_content'] = 'backend/pages/categories/edit';
        $this->load->view('backend/templates/template', $data);
    }

    public function set($field, $id){
        $id = (int)$id;
        if(in_array($field, array('status')) == FALSE){
            $this->session->set_flashdata('flash_message', array(
                'type' => 'error',
                'message' => 'Chức năng không hỗ trợ cho field "'.$field.'"',
            ));
            redirect('admin/categories');
        }
        $data['category'] = $this->categories_model->getCategoryID($id);

        if(!isset($data['category']) || is_array($data['category']) == FALSE || count($data['category']) == 0){
            $this->session->set_flashdata('flash_message', array(
                'type' => 'error',
                'message' => 'Danh mục không tồn tại',
            ));
            redirect('admin/categories');
        }

        if(!isset($data['category'][$field])) {
            $this->session->set_flashdata('flash_message', array(
                'type' => 'error',
                'message' => 'Danh mục không tồn tại field '.$field,
            ));
            redirect('admin/categories');
        }
        $flag = $this->categories_model->update_category($id,array(
                $field => ($data['category'][$field] == 1)?0:1,
            ));
        if($flag){
            $this->session->set_flashdata('flash_message', array(
                'type' => 'success',
                'message' => 'Thay đổi trạng thái danh mục '.$data['category']['name'].' thành công! ',
            ));
        }
        redirect('admin/categories');
    }

    public function delete()
    {
        //category id
        //$id = $this->uri->segment(4);
        $id = $this->input->post('empId');
        $this->categories_model->delete_category($id);
        //redirect('admin/categories');
        $status = "false";

        if ($this->db->affected_rows() > 0){
            $status = "true";

        }

        echo $status;
    }
    /**
     * Multi dell :v
     * @return [type] [description]
     */
    public function del_checked()
    {

            //validation rules
            $this->form_validation->set_rules('chk[]', 'checkbox', 'required|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run())
            {
                $checked_ids = $this->input->post('chk'); //selected checkbox
                if($this->categories_model->delete_checked($checked_ids)){
                $this->session->set_flashdata('flash_message', array(
                        'type' => 'success',
                        'message' => 'Xóa danh mục thành công',
                    ));
                }
                redirect('admin/categories');
            }
            else
            {
                $this->session->set_flashdata('flash_message', array(
                    'type' => 'error',
                    'message' => 'Chưa chọn checkbox cần xóa',
                ));
                redirect('admin/categories');

            }
    }

}