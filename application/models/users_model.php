<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model
{
	function __construct()
	{
	parent::__construct();
	$this->load->model('ci_encrypt');
	}

    public function getUserByID($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    /**
     * Validate the login's data with the database
     * @param string $user_name
     * @param string $password
     * @return void
     */
    function validate($user_name, $password) {
        $this->db->where('username', $user_name);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        if ($query->num_rows == 1) {
            return true;
        }
    }
    /**
     * [process_login description]
     * @param  [array] $login_array_input [description]
     * @return [bool]                    [description]
     */
    function process_login($login_array_input = NULL) {
        if (!isset($login_array_input) OR count($login_array_input) != 2) return false;

        //set its variable
        $email = $login_array_input[0];
        $password = $login_array_input[1];

        // select data from database to check user exist or not?
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $row = $query->row(); //object
            $user_id = $row->id;
            $user_pass = $row->password;
            $user_salt = $row->salt;
            if ($this->ci_encrypt->encryptUserPwd($password, $user_salt) === $user_pass) {
                $data = array(
                'user_id' => $user_id,
                'is_logged_in' => true,
                );
                $this->session->set_userdata($data);
                return 1;
            }
            return 2;
        }
        return 3;
    }

    function check_logged() {
        return ($this->session->userdata('logged_user')) ? TRUE : FALSE;
    }

    function logged_id() {
        return ($this->check_logged()) ? $this->session->userdata('logged_user') : '';
    }
    function check_pass($id,$password)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $user_pass = $row->password;
            $user_salt = $row->salt;
            if ($this->ci_encrypt->encryptUserPwd($password, $user_salt) === $user_pass) {
                return true;
            }
            return false;
        }
        return false;
    }
    function update_pass($id,$data){
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if($report !== 0){
            return true;
        }else{
            return false;
        }
    }


/**
 * Serialize the session data stored in the database,
 * store it in a new array and return it to the controller
 * @return array
 */
function get_db_session_data() {
    $query = $this->db->select('user_data')->get('ci_sessions');
    $user = array();
     /* array to store the user data we fetch */
    foreach ($query->result() as $row) {
        $udata = unserialize($row->user_data);

        /* put data in array using username as key */
        $user['user_name'] = $udata['user_name'];
        $user['is_logged_in'] = $udata['is_logged_in'];
    }
    return $user;
}

/**
 * Store the new user's data into the database
 * @return boolean - check the insert
 */
function create_member($data) {

        $insert = $this->db->insert('users', $data);
        return $insert;
}
 //create_member

function check_username_exits($username) {
    $this->db->where('username', $username);
    $result = $this->db->get('users');

    if ($result->num_rows() > 0) {
        return FALSE;
    }
    else {
        return TRUE;
    }
}

function check_email_exits($email) {
    $this->db->where('email', $email);
    $result = $this->db->get('users');

    if ($result->num_rows() > 0) {
        return FALSE;
    }
    else {
        return TRUE;
    }
}
    function update_user($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users',$data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if($report !== 0){
            return true;
        }else{
            return false;
        }
    }

}

