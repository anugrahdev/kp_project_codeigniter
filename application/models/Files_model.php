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
		return $query->result();
	}

	public function getFiles($uploader)
	{
		$query = $this->db->get_where('document', ['uploader' => $uploader]);
		return $query->result();
	}

	public function insertfile($file)
	{
		return $this->db->insert('document', $file);
	}

	public function download($id)
	{
		$query = $this->db->get_where('document', array('id' => $id));
		return $query->row_array();
	}

	public function delete($id)
	{
		$query = $this->db->get_where('document', array('id' => $id));
		return $query->row_array();
	}
}
