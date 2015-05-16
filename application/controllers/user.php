<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('categories_model','users_model','ci_encrypt'));

    }

	public function index()
	{
		if($this->session->userdata('is_logged_in')){
			redirect('admin/home');
        }else{
        	$data['title'] =  'Login Page - Admin';
        	$data['company_name'] = 'Z5 Company';
        	$this->load->view('backend/pages/login',$data);
        }
	}
	function __encrip_password($password) {
        return md5($password);
    }

    /**
    * check the username and the password with the database
    * @return void
    */
	function validate()
	{

		$this->load->model('users_model');

		$user_name = $this->input->post('username');
		$password = $this->__encrip_password($this->input->post('password'));

		$is_valid = $this->users_model->validate($user_name, $password);

		if($is_valid)
		{
			$data = array(
				'username' => $user_name,
				'is_logged_in' => true,
			);
			$this->session->set_userdata($data);
			redirect('admin/home');
		}
		else // incorrect username or password
		{
			$data['title'] =  'Login Page - Admin';
			$data['company_name'] = 'Z5 Company';
			$data['message_error'] = TRUE;
			$this->load->view('backend/pages/login', $data);
		}
	}

	public function login()
	{
		//if ($this->input->server('REQUEST_METHOD') === 'POST'){
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]|max_length[40]|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[35]|callback__authentication');
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == TRUE) {

                $last_login = gmdate('Y-m-d H:i:s', time() + 7*3600);
                $uid = $this->session->userdata('user_id');
                $this->users_model->update_user($uid,array('last_login' =>$last_login));
                //login successfull
                redirect(base_url() . 'user/profile/');

            }
        //}
        else {

            $data['navmenu'] = $this->categories_model->navigation();
            $data['title'] = "Login - BookShop";
            $data['main_content'] = 'frontend/pages/login';
            $this->load->view('frontend/templates/template',$data);
        }


	}

    public function _authentication($password = ''){

        $login_array = array($this->input->post('email'),$password);
        if($this->users_model->process_login($login_array) == 3){
            $this->form_validation->set_message('_authentication', 'Tài khoản không tồn tại');
            return FALSE;
        }

        if($this->users_model->process_login($login_array) == 2){
            $this->form_validation->set_message('_authentication', 'Mật khẩu không đúng');
            return FALSE;
        }
        return TRUE;
    }

    public function changepass()
    {
        $uid = $this->session->userdata('user_id');
        //echo "OK";
        //if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[35]');
            $this->form_validation->set_rules('new_password', 'new password', 'trim|required|min_length[5]|max_length[35]');
            $this->form_validation->set_rules('re_password', 'confirm password', 'trim|required|min_length[5]|max_length[35]|matches[new_password]');
            $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            if ($this->form_validation->run() == TRUE) {

                $password = $this->input->post('password');
                $new_pass = $this->input->post('new_password');
                if($this->users_model->check_pass($uid,$password)){
                    $rand_salt = $this->ci_encrypt->genRndSalt();
                    $encrypt_pass = $this->ci_encrypt->encryptUserPwd($new_pass,$rand_salt);
                    $update_data = array('password' => $encrypt_pass, 'salt' => $rand_salt,);
                    if($this->users_model->update_pass($uid,$update_data)){
                        $this->session->set_flashdata('flash_message', array(
                            'type' => 'success',
                            'message' => 'Thay đổi mật khẩu thành công',
                        ));
                    }
                    else{
                        $this->session->set_flashdata('flash_message', array(
                            'type' => 'error',
                            'message' => 'Thay đổi mật khẩu thất bại',
                        ));
                    }
                    redirect("user/profile","refresh");
                }
            }

        $data['navmenu'] = $this->categories_model->navigation();
        $data['title'] = "Profile - BookShop";
        $data['user_info'] = $this->users_model->getUserByID($uid);
        $data['main_content'] = 'frontend/pages/profile';
        $this->load->view('frontend/templates/template',$data);

    }

	public function profile()
    {

	    	if($this->session->userdata('is_logged_in')){
                $id = $this->session->userdata('user_id');
	    	$data['navmenu'] = $this->categories_model->navigation();
	    	$data['title'] = "Profile - BookShop";
	    	$data['user_info'] = $this->users_model->getUserByID($id);
	    	$data['main_content'] = 'frontend/pages/profile';
	        $this->load->view('frontend/templates/template',$data);
	    	}else{
	    		redirect('/','refresh'); // not login -> home
	    	}

    }

    public function update_profile()
    {
        $id = $this->session->userdata('user_id');
        $this->form_validation->set_rules('firstname', 'Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('tel', 'Telephone Number', 'trim|required|numeric');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

        if($this->form_validation->run()){
            $data_update = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'gender' => $this->input->post('gender'),
                'birthday' => $this->input->post('birthday'),
                'tel' => $this->input->post('tel'),
            );
            if($this->users_model->update_user($id, $data_update)){
                $this->session->set_flashdata('flash_message', array(
                    'type' => 'success',
                    'message' => 'Cập nhật thông tin thành công',
                ));
            }
            else{
                $this->session->set_flashdata('flash_message', array(
                    'type' => 'error',
                    'message' => 'Cập nhật thông tin thất bại',
                ));
            }
            redirect("user/profile","refresh");

        }
        $data['navmenu'] = $this->categories_model->navigation();
        $data['title'] = "Profile - BookShop";
        $data['user_info'] = $this->users_model->getUserByID($id);
        $data['main_content'] = 'frontend/pages/profile';
        $this->load->view('frontend/templates/template',$data);
    }

    public function up_avatar()
    {
    	$status = "";
	    $msg = "";
	    $img = "";
	    //$file_element_name = 'avatar'; //input name
	    $file_element_name = 'img_upload';

	    if ($status != "error")
    {
        $config['upload_path'] = './upload/avatars/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024 * 8;
        //$config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->set_allowed_types('*');

        $uid = $this->input->post('uid');

        if (!$this->upload->do_upload($file_element_name))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $data = $this->upload->data();
            $update_data = array('avatar' => $data['file_name']);
            	$this->db->where('id',$uid);
				$this->db->update('users',$update_data);
			$report = array();
			$report['error'] = $this->db->_error_number();
			$report['message'] = $this->db->_error_message();
            if($report != 0) // thành cong
            {
                $status = "success";
                $msg = "File successfully uploaded";
                $img = "<img src='".base_url('upload/avatars')."/".$data['file_name']."' class='avatar img-circle img-thumbnail'/>"; 
            }
            else
            {
                unlink($data['full_path']);
                $status = "error";
                $msg = $report['message'];
            }
        }
        @unlink($_FILES[$file_element_name]);
    }
    echo json_encode(array('status' => $status, 'msg' => $msg ,'img' => $img));
    }

	/**
    * Create new user and store it in the database
    * @return void
    */
	/*function create_member()
	{
		$this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('firstname', 'Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('tel', 'Telephone Number', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('re_password', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/signup_form');
		}

		else
		{
			$this->load->model('users_model');

			if($query = $this->Users_model->create_member())
			{
				$this->load->view('admin/signup_successful');
			}
			else
			{
				$this->load->view('admin/signup_form');
			}
		}

	}*/

	function register()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$this->load->library('form_validation');

			// field name, error message, validation rules
			$this->form_validation->set_rules('firstname', 'Name', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[users.email]'); // check email exist
			$this->form_validation->set_rules('tel', 'Telephone Number', 'trim|required|numeric');
			$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('re_password', 'Password Confirmation', 'trim|required|matches[password]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('address2', 'Address', 'trim');
			$this->form_validation->set_rules('company', 'Address', 'trim');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissable"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

			if($this->form_validation->run() == FALSE)
			{
				$data['title'] = "Register - BookShop";
	    		$data['main_content'] = 'frontend/pages/register';
	        	$this->load->view('frontend/templates/template',$data);
			}
			else{



				$rand_salt = $this->ci_encrypt->genRndSalt();
				$encrypt_pass = $this->ci_encrypt->encryptUserPwd( $this->input->post('password'),$rand_salt);
				$new_member_insert_data = array(
	            'firstname' => $this->input->post('firstname'),
	            'lastname' => $this->input->post('lastname'),
	            'email' => $this->input->post('email'),
	            'username' => $this->input->post('username'),
	            'password' => $encrypt_pass,
	            'gender' => $this->input->post('gender'),
	            'birthday' => $this->input->post('birthday'),
	            'tel' => $this->input->post('tel'),
	            'address' => $this->input->post('address'),
	            'address2' => $this->input->post('address2'),
	            'company' => $this->input->post('company'),
	            'postcode' => $this->input->post('postcode'),
	            'city' => $this->input->post('city'),
	            'salt' => $rand_salt,
	            );
	            	/*echo "<pre>";
	            	print_r($new_member_insert_data);
	            	echo "</pre>";die();*/



				if($query = $this->users_model->create_member($new_member_insert_data))
				{
					redirect('home/login');
				}
				else
				{
					redirect('home/register');
				}



			}
		}else{
		$data['title'] = "Register - BookShop";
    	$data['main_content'] = 'frontend/pages/register';
        $this->load->view('frontend/templates/template',$data);
    	}
	}

	function check_username_exits($username) { //custom callback fun
	   $user_available = $this->users_model->check_username_exits($username);

	    if ($user_available) {
	        return FALSE;
	    }
	    else {
	        return TRUE;
	    }
	}

	/**
    * Destroy the session, and logout the user.
    * @return void
    */
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}
}
