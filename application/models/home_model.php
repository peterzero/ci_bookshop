<?php
/**
* Home Model
*/
class Home_model extends CI_Model
{


	public function insert_contact($data)
	{
		$insert = $this->db->insert('contact', $data);
	    return $insert;
	}
	public function get_all_contacts()
	{
		$this->db->select('*');
		$this->db->order_by("created_on", "desc");
		$query = $this->db->get('contact');
		return $query->result_array();
	}
	/**
	 * Show contacts mới chưa đọc
	 * @return [type] [description]
	 */
	public function show_new_contact()
	{
		$this->db->select('*');
		$this->db->where('isRead', 0);
		$this->db->order_by("created_on", "desc");
		$query = $this->db->get('contact');
		return $query->result_array();
	}

	public function get_contact($id) //single_contact
	{
		$this->db->select('*');
		$this->db->where('contact_id', $id);
		$query = $this->db->get('contact');
		$array = $query->row_array();
		if ($array['isRead'] == 0) { //chưa đọc = 0
			$this->update_Read($id);
		}
		return $query->row_array();
	}

	public function count_new_contacts()
	{
		$this->db->where('isRead', 0);
		$this->db->from('contact');
		return $this->db->count_all_results();
	}
	public function count_total_contacts()
	{
		$this->db->from('contact');
		return $this->db->count_all_results();
	}

	public function update_Read($id)
	{
		$this->db->where('contact_id',$id);
		$this->db->update('contact', array('isRead' => 1));
	}
	public function delete_contact($id)
	{
		$this->db->where('contact_id', $id);
		$del = $this->db->delete('contact');
		//return $del;
		return $this->db->affected_rows();
	}
	function delete_checked($checked_ids)
	{
	    $this->db
	        ->where_in('id', $checked_ids)
	        ->delete('contact');
	    return $this->db->affected_rows();
	}

	public function getComment($product_id ,$parent_id)
	{

	    $this->db->select('*');
	    $this->db->from('comment');
	    $this->db->join('users', 'users.id = comment.user_id');
	    $this->db->where('product_id', $product_id);
	    $this->db->where('parent_id', $parent_id);
	    $query = $this->db->get();
	    return $query->result_array();
	}
	public function getComment2()
	{

	    $this->db->select('*');
	    $query = $this->db->get('comment');
	    return $query->result_array();
	}
	public function count_cmt($product_id)
	{
	   	$this->db->where('product_id', $product_id);
	   	return $this->db->count_all_results('comment');
	}





}