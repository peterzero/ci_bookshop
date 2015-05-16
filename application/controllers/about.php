<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* About Page
*/
class About extends CI_Controller
{
	public function index()
	{
		$data['title'] = "BookShop - About";


		//$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js');
		$data['main_content'] = 'frontend/pages/about';
        $this->load->view('frontend/templates/template',$data);


	}
}

?>