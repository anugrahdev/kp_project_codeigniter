<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bagian_model extends CI_Model
{

    public function viewByFungsi($id_fungsi)
    {
        $this->db->where('id_fungsi', $id_fungsi);
        $result = $this->db->get('bagian')->result(); // Tampilkan semua data kota berdasarkan id provinsi

        return $result;
    }
}
