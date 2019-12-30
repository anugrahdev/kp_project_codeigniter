<?php
class Fungsibagian_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_fungsi()
    {
        $query = $this->db->get('fungsi');
        return $query;
    }

    function get_bagian($fungsi_id)
    {
        $query = $this->db->get_where('bagian', array('bagian_fungsi_id' => $fungsi_id));
        return $query;
    }
}
