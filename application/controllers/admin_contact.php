<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_contact extends CI_Controller {
	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
        $this->load->model('home_model');
    }
    public function index()
    {
    	$data['title'] = "Inbox - Admin Panel";
    	$data['specific_scripts'] = array('bootstrap-tag.min.js','jquery.hotkeys.min.js','bootstrap-wysiwyg.min.js');
    	$data['custom_scripts'] = 'backend/common/inbox_script';
    	$array = array(
            'count_new_contact' => $this->home_model->count_new_contacts(),
            'show_new_contact'  => $this->home_model->show_new_contact()
        );

        $this->session->set_userdata( $array );

    	$data['main_content'] = 'backend/pages/contacts/list';
    	$data['contacts'] = $this->home_model->get_all_contacts();
    	$data['new_contact'] = $this->home_model->count_new_contacts(); //count new message
    	$data['all_contact'] = $this->home_model->count_total_contacts();
    	$this->load->view('backend/templates/template', $data);
    }
    public function view()
    {
    	if(isset($_POST['id'])){
	    	$id = $_POST['id'];
	    	$query = $this->home_model->get_contact($id);
	    	$count = $this->home_model->count_new_contacts();
	    	$data = array(
	    		'name' => $query['contact_name'],
	    		'subject' => $query['contact_subject'],
	    		'content' => $query['contact_content'],
	    		'time' => $query['created_on'],
	    		'count' => $count,
	    	);
	    	$array = array(
            'count_new_contact' => $this->home_model->count_new_contacts(),
            'show_new_contact'  => $this->home_model->show_new_contact()
        );

        $this->session->set_userdata( $array );
    	die(json_encode($data));
    	}


    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->home_model->delete_contact($id);
        $count_all = $this->home_model->count_total_contacts();
        //redirect('admin/categories');
        $status = "false";

        if ($this->db->affected_rows() > 0){
            $status = "true";
        }
        //echo $status;
        $data = array(
        	'status' => $status,
        	'countall' => $count_all,
        	);
        $array = array(
            'count_new_contact' => $this->home_model->count_new_contacts(),
            'show_new_contact'  => $this->home_model->show_new_contact()
        );

        $this->session->set_userdata( $array );
        die(json_encode($data));
    }
    public function test()
    {
    	$data['contacts'] = $this->home_model->get_all_contacts();
    	$data['new_contact'] = $this->home_model->count_new_contacts(); //count new message
    	$data['all_contact'] = $this->home_model->count_total_contacts();
    	$this->load->view('backend/pages/contacts/list', $data);
    }
}