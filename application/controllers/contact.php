<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact Page
*/
class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}
	public function index()
	{
		$data['title'] = "BookShop - Contact";

		//$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js');
		$data['main_content'] = 'frontend/pages/contact';
        $this->load->view('frontend/templates/template',$data);


	}

    public function send_contact()
    {
        $time = gmdate('Y-m-d H:i:s', time() + 7*3600);
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if($this->form_validation->run()){
                $data_to_insert = array(
                    'contact_name' => $this->input->post('name'),
                    'contact_email' => $this->input->post('email'),
                    'contact_subject' => $this->input->post('subject'),
                    'contact_content' => $this->input->post('message'),
                    'created_on' => $time,
                    'isRead' => 0,
                );
                if ($this->home_model->insert_contact($data_to_insert)) {
                    $this->session->set_flashdata('flash_message', array(
                        'type' => 'success',
                        'message' => 'Đã gửi thành thành công! Chúng tôi sẽ liên hệ trong thời gian sớm nhất.',
                    ));
                } else {
                    $this->session->set_flashdata('flash_message', array(
                        'type' => 'error',
                        'message' => 'Gửi thất bại!',
                    ));
                }
                redirect('contact/redirect');
                

            }

        }

    }
    public function redirect()
    {
        $data['title'] = "Succesfull -Redirect";
        $data['main_content'] = 'frontend/pages/redirect';
        $this->load->view('frontend/templates/template',$data);
    }
}

?>