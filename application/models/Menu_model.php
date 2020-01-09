<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.menu 
        FROM user_sub_menu JOIN user_menu
        ON user_sub_menu.menu_id = user_menu.id";
        return $this->db->query($query)->result_array();
    }

    public function edit_submenu($id, $title, $menu_id, $url, $icon)
    {
        $query = "UPDATE user_sub_menu SET title='$title', menu_id='$menu_id', url='$url', icon='$icon' WHERE id = '$id'";
        return $this->db->query($query);
    }
}
