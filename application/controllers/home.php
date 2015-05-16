<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Home
*/
class Home extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('products_model');
        $this->load->model('categories_model');
        $this->load->model('home_model');
        $this->load->model('users_model');
    }

	public function index()
	{
		$data['title'] = "BookShop - Home";


		//$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js');
		$data['books_new'] = $this->products_model->showAllProduct(4);
		$data['books_best'] = $this->products_model->showAllProduct(100);
		//$data['navmenu'] = $this->navbar(0,$this->categories_model->getCategories());
		$data['navmenu'] = $this->categories_model->navigation();
		$data['main_content'] = 'frontend/pages/index';
        $this->load->view('frontend/templates/template',$data);


	}

	public function single_product($param)
	{
		$data['title'] = "Product - BookShop";
		$data['product'] = $this->products_model->get_product($param);
		$data['navmenu'] = $this->categories_model->navigation();
		//$data['showComment'] = $this->showComment2(0,$this->home_model->getComment2());
		$data['showComment'] = $this->showComment(1);
		$data['count_comment'] = $this->home_model->count_cmt($param);
		if(empty($param) || !isset($data['product']['id'])){
			redirect('home');
		}
		//$id = $this->uri->segment(3);
		//echo $id;exit();
		//$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js');
		$data['main_content'] = 'frontend/pages/single_product';
        $this->load->view('frontend/templates/template',$data);
	}

	public function cat($param)
	{
		$data['title'] = "Product - BookShop";
		$data['navmenu'] = $this->categories_model->navigation();
		$data['cat_name']  = $this->categories_model->getCategoryID($param);
		$data['products'] = $this->products_model->get_product_by_cat($param);
		if(empty($param)){
			redirect('home');
		}
		$data['main_content'] = 'frontend/pages/products';
        $this->load->view('frontend/templates/template',$data);
	}

	public function about()
	{
		$data['title'] = "About BookShop";
		$data['navmenu'] = $this->categories_model->navigation();

		//$data['specific_scripts'] = array('jquery.dataTables.min.js','jquery.dataTables.bootstrap.min.js','dataTables.tableTools.min.js','dataTables.colVis.min.js');
		$data['main_content'] = 'frontend/pages/about';
        $this->load->view('frontend/templates/template',$data);


	}

	public function contact()
	{
		$data['title'] = "BookShop - Contact";
		$data['navmenu'] = $this->categories_model->navigation();
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

    public function search()
    {

    	$q = $this->input->post('query');
    	$result = $this->products_model->search_product($q);
    	if(count($result) > 0){
	      foreach ($result as $row){
	        $new_row['name']= htmlentities(stripslashes($row['name']));
	        $new_row['price']= !empty($row['sell_price']) ? htmlentities(stripslashes($row['cost_price'])) : htmlentities(stripslashes($row['sell_price']));
	        $new_row['author']= htmlentities(stripslashes($row['author']));
	        $new_row['image']= htmlentities(stripslashes($row['image_thumb']));
	        $row_set[] = $new_row; //build an array
?>
	        <div class="suggest-item" align="left">
                <a href="<?=base_url() ?>home/single_product/<?=$row['id']?>">
                    <div class="image-thumb-min">
			            <img src="<?=base_url().'upload/book-covers/'.$new_row['image']?>" />
                    </div>
                    <div class="suggestionlabel">
                        <span class="title"><?php echo $new_row['name']; ?></span>
                        <div class="detail">
                            <span>Tác giả: <?php echo $new_row['author']; ?></span>
                            <span class="price"><?php echo $new_row['price']; ?></span>
                        </div>
                    </div>
                </a>
            </div>
		<?php
	      }
	      //echo json_encode($row_set); //format the array into json data

		}else{
            echo '<p class="text-center">No Result Found !</p>';
        }

    }

    public function test($parent_id ='')
    {
    	$comments = $this->home_model->getComment(1,$parent_id);
    		echo "<pre>";
    		print_r($comments);
    		echo "</pre>";die();

    }

    public function register()
    {
    	if(!$this->session->userdata('is_logged_in')){
    	$data['title'] = "Register - BookShop";
    	$data['main_content'] = 'frontend/pages/register';
        $this->load->view('frontend/templates/template',$data);
    	}else{
    		redirect('/','refresh'); // login -> home
    	}
    }

    public function login()
    {
    	$data['navmenu'] = $this->categories_model->navigation();
    	$data['title'] = "Login - BookShop";
    	$data['main_content'] = 'frontend/pages/login';
        $this->load->view('frontend/templates/template',$data);
    }

    public function showComment($product_id, $parent_id = 0, $level = 0)
    {
    	$str = '';
    	$comments = $this->home_model->getComment($product_id,$parent_id);
    	if (!empty($comments)) {
    	if($level == 0){
    	$str .= '<ul class="list-unstyled review-list">';
    	}else{
    		$str .= '<ul class="list-unstyled sub-cmt-'.$level.'" style="margin-left:30px">';
    	}

    	foreach ($comments as $comment) {

    		$comment_id = $comment['comment_id'];
        	$member_id = $comment['user_id'];
        	$comment_text = $comment['content'];
        	$time = timespan($comment['comment_time'],time()).' ago';

        	//$users = $this->users_model->getUserByID($member_id);

        	$username = $comment['user_id'] == 0 ? 'Anonymous' : $comment['username'];
        	$user_avatar = $comment['avatar'];
        	//$comment_timestamp = ($comment['comment_timestamp']);  //get time ago

    		//html
    		if($level == 0){

			$str .=	'<li>';
			$str .= '<section class="paper">';
			$str .=	'<div class="tape"></div>';
			$str .=		'<div class="head"></div>';
			$str .=			'<div class="row review-content">';
			$str .=				'<div class="col-md-2 col-sm-2">';
			$str .=					'<div class="customer-image-text1"><img class="img-circle img-thumbnail" src="'.site_url('upload/avatars').'/'.$user_avatar.'" alt="avatar"></div>';
			$str .=			'</div>';
			$str .=					'<div class="col-md-10 col-sm-10">';
			$str .=						'<h5 class="customer-name inner-right-xs">'.$username.'</h5>';
			$str .=							'<p class="posted-date">'.$time.'</p>';
			$str .=							'<p class="text">'.$comment['content'].'</p>';
			$str .=								'<a href="index.php?page=single-book#" class="reply-review">Reply</a>';
			$str .=					'</div>';
			$str .=						'</div>';
			$str .=						'<div class="bottom"></div>';
			$str .=	'</section>';
			//$str .=	'</li>';

			}
			else{

					$str .=	'<li>';
					$str .= '<section class="paper">';
					$str .=	'<div class="tape"></div>';
					$str .=		'<div class="head"></div>';
					$str .=			'<div class="row review-content">';
					$str .=				'<div class="col-md-2 col-sm-2">';
					$str .=					'<div class="customer-image-text1"><img class="img-circle img-thumbnail" src="'.site_url('upload/avatars').'/'.$user_avatar.'" alt="avatar"></div>';
					$str .=			'</div>';
					$str .=					'<div class="col-md-10 col-sm-10">';
					$str .=						'<h5 class="customer-name inner-right-xs">'.$comment['user_id'].'</h5>';
					$str .=							'<p class="posted-date">'.$time.'</p>';
					$str .=							'<p class="text">'.$comment['content'].'</p>';
					$str .=								'<a href="index.php?page=single-book#" class="reply-review">Reply</a>';
					$str .=					'</div>';
					$str .=						'</div>';
					$str .=						'<div class="bottom"></div>';
					$str .=	'</section>';
					//$str .=	'</li>';
			}
			//$str .= $comment['content'] . 'level: '.$level.'<br />';

    		//Recurse
        	$str .= $this->showComment($product_id, $comment_id, $level+1);
        	$str .=	'</li>';

        }
        $str.='</ul>';
		}
        return $str;

    }

    public function showComment2($parentid= 0, $data = NULL)
    {
    	$str = '';
    	$level = 0;
    	foreach ($data as $comment) {
    		if($comment['parent_id'] == $parentid){
    		$comment_id = $comment['comment_id'];
        	$member_id = $comment['user_id'];
        	$comment_text = $comment['content'];
        	//$comment_timestamp = ($comment['comment_timestamp']);  //get time ago

    		//html
    		//if($level == 0){
    		/*$str .= '<div id="maincomm">';
			$str .= '<img src="'.$comment['comment_id'].'">';
		    $str .= '<p id="name">'.$comment['user_id'].'</p>';
		    $str .= '<p id="level">'.$level.'</p>';
			$str .= '<p>'.$comment['content'].'</p>';
			$str .= '<div class="clearfix"></div>';
			$str .= '</div>';*/
			//}
			/*else{
				$str .= '<div id="subcomm">';
				$str .= '<img src="'.$comment['comment_id'].'">';
				$str .= '<p id="name">'.$comment['user_id'].'</p>';
				$str .= '<p>'.$comment['content'].'</p>';
				$str .= '<div class="clearfix"></div>';
				$str .= '</div>';
				echo "ok";
			}*/
			$str .= $comment['content'] . 'level: '.$level.'<br />';

    		//Recurse
        	$str .= $this->showComment2($comment_id, $data);
        	$level++;
        }

        }

        return $str;

    }

	/*public function navbar($parentid= 0, $data = NULL)
	{
		$html='<ul class="nav navbar-nav">';
		 foreach($data as $item){
	      if($item['parent_id'] == 0){
	      $html.= '<li><a href="#">'.$item['name'].'</a>';
	      $id = $item['id'];
	      $this->sub($id, $data);
	      $html.= '</li>';
	      }
 		}
 		$html.='</ul>';
 		return $html;
	}*/

	/*public function navbar($parentid = 0, $data = NULL)
	{


		$html = '';

		if (isset($data) && is_array($data) ) {
			if ($this->isfirst == 0) {
				$html = '<ul class="nav navbar-nav">';
			}else if($this->isfirst != 0 && $this->issingle == 0){
				$html = '<ul>';
			}else if($this->isfirst != 0 && $this->issingle != 0){
				$html .= '<ul class="dropdown-menu">';
			}


			foreach ($data as $key => $value) {

				if($value['parent_id'] == $parentid){
					if ($value['parent_id'] != 0) {
						$this->isfirst =1;
						$this->issingle = 1;
					}else{$this->issingle = 0;
						$this->isfirst =1;
					}
				$html .= '<li><a href="'.$value['id'].'">'.$value['name'].'</a>';
				//unset($data[$key]);
				$html .= $this->navbar($value['id'],$data);
				$html .= '</li>';
				}
			}
			$html .= '</ul>';
		}
		return $html;


	}*/

/*public function navbar($parentid = 0, $data = NULL){
    $str = '';
    $ext = 'category.php?cid=';
    if(isset($data)){
    $str .= '<ul>';
    foreach($data as $rs){
    	if($rs['parent_id'] == $parentid){
	    $str .= '<li><a href="'.$ext.$rs['id'].'">'.$rs['name'].'</a>';
	    $str .= $this->navbar($rs['id'],$data);
	    $str .= '</li>';
	}
    }
    	$str .= '</ul>';
    }
    return $str;
    }*/

}

?>