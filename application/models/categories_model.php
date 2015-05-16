<?php
/**
* Categories Model
*/
class Categories_model extends CI_Model
{
	private $menus;
    private $keys_to_skip = array();

	public function getCategories()
	{
		$this->db->select('*');
		$result = $this->db->get('categories');
		if ($result->num_rows() > 0) {
            return $result->result_array();
        }

	}

	public function getCategoryID($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$result = $this->db->get('categories');
		return $result->row_array();
	}

	public function insert_category($data)
    {
		$insert = $this->db->insert('categories', $data);
	    return $insert;
	}

	function update_category($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('categories', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

	public function delete_category($id)
	{
		$this->db->where('id', $id);
		$del = $this->db->delete('categories');
		//return $del;
		return $this->db->affected_rows();
	}

	function delete_checked($checked_ids)
	{
	    $this->db
	        ->where_in('id', $checked_ids)
	        ->delete('categories');
	    return $this->db->affected_rows();
	}

	/**
	 * Dynamic menubar
	 */

	public function menus() {
        $this->db->select("*");
        $this->db->from("categories");
        $this->q = $this->db->get();
        if ($this->q->num_rows() > 0) {
            return $this->q->result_array();
        }
    }

    public function navigation($selected = null) {
        $this->menus = $this->menus();
        $out = '<ul class="nav navbar-nav">';
        foreach ($this->menus as $k => $menu) {

            //var_dump($this->keys_to_skip);
            if (!in_array($k, $this->keys_to_skip)) {
                $class = (strcasecmp($menu['name'], $selected) == 0 ) ? "active " : "";
                $out .= $this->check_children($menu, $class);
            }
        }
        $out .= "</ul>";
        return $out;
    }

    function check_children($menu, $class) {

        if ($this->hasChildren($menu['id'])) {

            $class .="dropdown yamm-fw";
            $out = "<li class='$class'> <a href='".base_url()."home/cat/{$menu['id']}'class='dropdown-toggle' data-hover='dropdown' data-toggle='dropdown'>" . $menu['name'] . "<b class='caret'></b>" . "</a>";
            $out .= $this->getChildren($menu['id']);
            $out .= "</li>";
        } else {
            $out = "<li class='$class'>";
            if ($menu['id'] != null) {
                $out .= "<a href='".base_url()."home/cat/{$menu['id']}'>{$menu['name']}</a>";
            } else {
                $out .= "<span>" . $menu['name'] . "</span>";
            }
            $out .= "</li>";
        }
        return $out;
    }

    private function hasChildren($menu_id) {
        foreach ($this->menus as $menu) {
            if ($menu['show_condition'] && $menu['parent_id'] == $menu_id) {
                return TRUE;
            }
        }
        return FALSE;
    }

    private function getChildren($parent_id) {
        $has_subcats = FALSE;
        $out = "<ul class='dropdown-menu'>";
        $out .= "<li>";
        $out .= "<div class='yamm-content'>";
        $out .= "<div class='row'>";
        foreach ($this->menus as $k => $menu) {
            if ($menu['show_condition'] && $menu['parent_id'] == $parent_id) {
                array_push($this->keys_to_skip, $k);
                $has_subcats = TRUE;
                $out .= '<div class="col-md-2 col-sm-6">';
                $out .= '<div class="section">';
                $out .="<ul class='links list-unstyled'>";
                $out .= $this->check_childrens($menu, "");
                $out .= "</ul>";
                $out .= "</div>";
                $out .= "</div>";
            }
        }
        $out .= "</div>";
        $out .= "</div>";
        $out .= "</li>";
        $out .= "</ul>";
        return ( $has_subcats ) ? $out : FALSE;
    }

    function check_childrens($menu, $class) {

        if ($this->hasChildren($menu['id'])) {

            $class .="dropdown";
            $out = "<li><h5 class='title'>".$menu['name']."</h5>";
            $out .= $this->getChildrens($menu['id']);
            $out .= "</li>";

        } else {
            $out = "<li class='$class'>";
            if ($menu['id'] != null) {
                $out .= "<a href='".base_url()."home/cat/{$menu['id']}'>{$menu['name']}</a>";
            } else {
                $out .= "<span>" . $menu['name'] . "</span>";
            }
            $out .= "</li>";
        }
        return $out;
    }

    private function getChildrens($parent_id) {
        $out ='';
        foreach ($this->menus as $k => $menu) {
            if ($menu['show_condition'] && $menu['parent_id'] == $parent_id) {
                $out .= $this->check_childrens($menu, '');
                array_push($this->keys_to_skip, $k);

            }
        }
        return $out;
    }

}

 ?>