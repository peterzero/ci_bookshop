<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }

    }
	public function index()
	{
        $this->load->model('home_model');
		$data['title'] = "Admin Panel";
        //Set session cho contact box
        $array = array(
            'count_new_contact' => $this->home_model->count_new_contacts(),
            'show_new_contact'  => $this->home_model->show_new_contact()
        );

        $this->session->set_userdata( $array );

		$data['main_content'] = 'welcome_message';
        $this->load->view('backend/templates/template', $data);
	}
    public function test()
    {
        //$this->session->unset_userdata('show_new_contact');
        $data1=$this->session->all_userdata();
         echo "<pre>";
         print_r($data1);
         echo "</pre>";die();
    }
}