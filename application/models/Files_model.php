<?php
class Files_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllFiles()
	{
		$query = $this->db->get('document');
		return $query;
	}

	public function getFiles($uploader)
	{
		$query = $this->db->get_where('document', ['uploader' => $uploader]);
		return $query;
	}

	public function insertfile($file)
	{
		return $this->db->insert('document', $file);
	}

	// public function insertmultiple($filename, $desc, $pass, $uploader)
	// {
	// 	return $this->db->insert('document',)
	// }

	public function download($id)
	{
		$query = $this->db->get_where('document', array('id' => $id));
		return $query->row_array();
	}

	public function viewbyname($name)
	{
		$query = $this->db->get_where('document', array('file_name' => $name));
		return $query->row_array();
	}

	public function delete($id)
	{
		$query = $this->db->get_where('document', array('id' => $id));
		return $query->row_array();
	}

	function edit($deskriptsi, $password)
	{
		$hasil = $this->db->query("UPDATE document SET file_password='$password',description='$deskriptsi'");
		return $hasil;
	}

	function getpassword($filename)
	{
		$query = $this->db->get_where('document', array('file_name' => $filename));
		return $query->row_array();
	}
}
