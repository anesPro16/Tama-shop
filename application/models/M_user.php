<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function tampilData()
	{
		// ambil data dari tabel 'user'
		return $this->db->get('user');
	}

	public function addUser($data, $table) {
		return $this->db->insert($table, $data);
	}

	public function editProfil($where, $table)
	{
		
		// menampilkan data tabel '$table' berdasarkan '$where'
		return $this->db->get_where($table, $where);
	}

	public function updateProfil($where, $data, $table)
	{
		// memilih data berdasarkan '$where'
		return $this->db->where($where);
		// mengupdate data dari tabel 'user' berdasarkan '$data' 
		return $this->db->update('user', $data);
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */