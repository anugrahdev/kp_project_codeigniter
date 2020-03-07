<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fungsi_model extends CI_Model
{

    public function view()
    {
        return $this->db->get('fungsi')->result(); // Tampilkan semua data yang ada di tabel fungsi
    }

    public function bagianview()
    {
        return $this->db->get('bagian')->result(); // Tampilkan semua data yang ada di tabel bagian

    }
}
