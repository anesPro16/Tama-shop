<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function tampilData() {
		return $this->db->get('tb_barang');
	}
	public function getBrg($limit, $start) {
		return $this->db->get('tb_barang', $limit, $start)->result_array();
	}
	public function itungAllBrg() {
		return $this->db->get('tb_barang')->num_rows();
	}
	public function addBarang($data, $table) {
		return $this->db->insert($table, $data);
	}
	public function editBarang($where, $table) {
		return $this->db->get_where($table, $where);
	}

	public function updateData($where, $data, $table) {
		$this->db->where($where);
		$this->db->update('tb_barang', $data);
	}

	public function hapusData($where, $table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($id)
	{
		$result = $this->db->where('id_brg', $id)->limit(1)->get('tb_barang');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function detailBrg($id_brg)
	{
		$result = $this->db->where('id_brg', $id_brg)->get('tb_barang');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function getAllBrg()
	{
		return $this->db->get('tb_barang')->result_array();
	}

	public function cariBrg()
	{
		$kataKunci = $this->input->post('kataKunci', true);
		$this->db->like('nama_brg', $kataKunci);
		$this->db->or_like('keterangan', $kataKunci);
		$this->db->or_like('kategori', $kataKunci);
		return $this->db->get('tb_barang')->result_array();
	}

	public function kodeOtomatis($table, $key)
	{
		$this->db->select('right(' . $key . ',3) as kode', false);
		$this->db->order_by($key, 'desc');
		$this->db->limit(1);
		$query = $this->db->get($table);
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		return $kodemax;
	}


}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */