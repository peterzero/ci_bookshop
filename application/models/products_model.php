<?php
/**
* Product Model
*/
class Products_model extends CI_Model
{


	/**
	 * [getProductById description]
	 * @param  [int] $id [product_id]
	 * @return [array]
	 */
	public function getProductById($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	/**
	 * Get Products for Detail Page /Single Page
	 * @param  [int] $pid product id
	 * @return [array]      [1 row]
	 */
	function get_product($pid){//--for single_product_page--
		$this->db->select('*');
		$this->db->where('id', $pid);
		$this->db->where('status', 1);
		$query = $this->db->get('products');
		//increase the number of view for this product
		$array = $query->row_array();
		$new_views = $array['viewed']+1 ;
		$this->db->where('id', $pid);
		$this->db->update('products', array('viewed' => $new_views));
		//increase the number of view for this category
		$this->db->select('viewed');
		$this->db->where('id', $array['category_id']);
		$query_cat = $this->db->get('categories');
		$new_array = $query_cat->row_array();
		$newdata = array('viewed' => $new_array['viewed']+1);
		$this->db->where('id', $array['category_id']);
		$this->db->update('categories', $newdata);
		return $query ->row_array();

	}
	/**
	 * [get products by category_id description]
	 * @param  [int] $cat_id Category id
	 * @return [array]         [mullti record]
	 */
	public function get_product_by_cat($cat_id)
	{
		$this->db->select('*');
		$this->db->where('category_id', $cat_id);
		$this->db->where('status', 1);
		$query = $this->db->get('products');
		return $query->result_array();
	}

	public function getAllProducts()
	{
		$this->db->select('name,cost_price,author,created_on,status');
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getAllProducts2()
	{
		$this->db->select('*');
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function showAllProduct($limit = 5)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('status', 1); //show
		$this->db->order_by("id", "desc");
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function insert_product($data)
    {
		$insert = $this->db->insert('products', $data);
	    return $insert;
	}

	function update_product($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('products', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

	public function delete_product($id)
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('products');
		return $del;
	}

	public function search_product($q)
	{
		$this->db->select('*');
	    $this->db->like('name', $q);
	    $this->db->or_like('sell_price', $q);
	    $this->db->or_like('author', $q);
        $this->db->limit(5);
	    $query = $this->db->get('products');
	    return $query->result_array();

	}

}
 ?>