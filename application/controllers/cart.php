<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('products_model');
	}

	public function add_to_cart($pid,$qty)
	{

		$query = $this->products_model->getProductById($pid);

		if (isset($pid) || count($query) != 0 || isset($query['id'])) {
			$name=	$query['name'];
    		$price= $query['sell_price'] != 0 ? $query['sell_price'] : $query['cost_price'];
    		$img= $query['image_thumb'];
    		$author = $query['author'];

			$data = array(
               'id'      => $pid,
               'qty'     => $qty,
               'price'   => $price,
               'name'    => $name,
               'options' => array('img' => $img, 'author' => $author)
            );


			$this->cart->insert($data);
			//echo count($this->cart->contents());
			$total_items = count($this->cart->contents());
			$total = number_format($this->cart->total());
			die(json_encode(array('items'=>$total_items, 'total' => $total)));
		} else {
			redirect('home');
		}


	}

	public function view_cart()
	{
if($this->cart->contents()){
	 $cart_box = '<div class="cart-items">';
$cart_box .=				'<div class="cart-items-list">';
$cart_box .=					'<ul>';
foreach ($this->cart->contents() as $item) {


$cart_box .=						'<li class="media ">';
$cart_box .= 							'<a href="javascript:void(0);" class="fa fa-times fa-3x" onclick="remove_cart(\''.$item['rowid'].'\')"></a>';
$cart_box .=							'<div class="clearfix book cart-book">';
$cart_box .=								'<a href="index.php?page=single-book" class="media-left">';
$cart_box .=									'<div class="book-cover">';
$cart_box .=										'<img width="140" height="212" alt="" src="'.base_url().'upload/book-covers/'.$item['options']['img'].'"">';
$cart_box .=									'</div>';
$cart_box .=								'</a>';
$cart_box .=								'<div class="media-body book-details">';
$cart_box .=									'<div class="book-description">';
$cart_box .=										'<h3 class="book-title"><a href="index.php?page=single-book">'.$item['name'].'</a></h3>';
$cart_box .=											'<p class="book-subtitle">by <a href="#">'.$item['options']['author'].'</a></p>';
$cart_box .=										'<p class="price m-t-20">'.$item['price'].'</p>';
$cart_box .=									'</div>';
$cart_box .=									'<input type="number" min="1" max="50" onchange="update_cart(\''.$item['rowid'].'\')" value="'.$item['qty'].'" name="'.$item['rowid'].'_qty" id="'.$item['rowid'].'_qty" class="form-control bookshop-form-control" style="height:35px;" size="5">';
$cart_box .=								'</div>';
$cart_box .=							'</div>';
$cart_box .=						'</li>';
}
$cart_box .=					'</ul>';
$cart_box .=				'</div>';
$cart_box .=				'<div class="cart-item-footer">';
$cart_box .=					'<h3 class="total text-center">Total: <span>'.number_format($this->cart->total()).'</span></h3>';
$cart_box .=					'<div class="proceed-to-checkout text-center">';
$cart_box .=						'<button type="button" class="btn btn-primary btn-uppercase">Proceed to Checkout</button>';
$cart_box .=					'</div>';
$cart_box .=				'</div>';

$cart_box .=		'</div>';
echo $cart_box; //exit and output content
/*$total_items = count($this->cart->contents());
$total = number_format($this->cart->total());
die(json_encode(array('items'=>$total_items, 'total' => $total, 'cart' => $cart_box)));*/
}else{
	echo '<div class="alert alert-success text-center"><h3>This cart is empty.</h3</div>';
}
	}

	public function test()
	{
		echo "<pre>";
			print_r($this->view_cart());
			echo "</pre>";die();
	}

	public function remove_cart($rowid)
	{
		if ($rowid=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
               'rowid' => $rowid,
               'qty'   => 0
            );

		$this->cart->update($data);
	}
			/*echo "<pre>";
			print_r($this->cart->contents());
			echo "</pre>";die();*/

		//$this->view_cart();
		$total_items = count($this->cart->contents());
		$total = number_format($this->cart->total());
		die(json_encode(array('items'=>$total_items, 'total' => $total)));
	}

	public function update_cart($id,$qty)
	{
			$data = array(
               'rowid' => $id,
               'qty'   => $qty
            );

		$this->cart->update($data);
		//$this->view_cart();
		$total = number_format($this->cart->total());
		die(json_encode(array('total' => $total)));
	}

	/*function remove($rowid) {
		if ($rowid=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

			$this->cart->update($data);
		}

		redirect('cart');
	}

	function update_cart2(){
 		foreach($_POST['cart'] as $id => $cart)
		{
			$price = $cart['price'];
			$amount = $price * $cart['qty'];

			$this->Cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
		}

		redirect('cart');
	}*/
}
?>
