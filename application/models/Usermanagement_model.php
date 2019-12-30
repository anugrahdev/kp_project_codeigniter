<?php
class Usermanagement_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAlluser()
    {
        $query = $this->db->get_where('user', ['role_id' => 2]);
        return $query->result();
    }


    public function delete($id)
    {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }
    function get_users()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('fungsi', 'fungsi = fungsi.id', 'left');
        $this->db->join('bagian', 'bagian = bagian.id', 'left');
        $query = $this->db->get();
        return $query;
    }
}
