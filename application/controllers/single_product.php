<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Detail Single Product Page
*/
class Single_product extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->model('categories_model');
    }

	public function index()
	{

		$this->layout();

	}
	public function single_product()
	{
		$data['title'] = "BookShop - Product";

		$id = $this->uri->segment(2);
		echo $id;exit();
		$data['product'] = $this->products_model->get_product($id);
		//$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js');
		$data['main_content'] = 'frontend/pages/single_product';
        $this->load->view('frontend/templates/template',$data);
	}
}

?>