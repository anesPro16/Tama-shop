<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model {
	
	public function tampilData()
	{
		$result = $this->db->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function find($id)
	{
		$result = $this->db->where('id_user', $id)->limit(1)->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			// return array();
			$this->session->set_flashdata('pesan', '<script>alert("Anda Belum Memesan");</script>');
			redirect('buyer');
			return false;
		}
	}

	public function detailInv($id)
	{
		$result = $this->db->where('id_user', $id)->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function tampilDataPsn()
	{
		$result = $this->db->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function getData($table)
	{
		return $this->db->get($table)->result();
	}

	public function getAllInv() {
		return $this->db->get('tb_invoice');
	}

	public function joinInvPes()
	{
		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_pesanan.id_invoice = tb_invoice.id');
		return $this->db->get();
	}

	public function joinData($where)
	{
		$this->db->select('*');
		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_pesanan.id_invoice = tb_invoice.id');
		$this->db->where($where);
		// $query = $this->db->get();
		// return $query;
		return $this->db->get();
	}

	public function ambilIdInv($id_invoice)
	{
		$result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}

	}

	public function ambilIdPesan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function editSta($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function hapusInvoice($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function riwayat($id)
	{
		$result = $this->db->where('id_user', $id)->limit(1)->get('tb_lapor');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			// return array();
			$this->session->set_flashdata('pesan', '<script>alert("Anda Belum Melapor");</script>');
			redirect('buyer');
			return false;
		}
	}

	public function detailRiw($id)
	{
		$result = $this->db->where('id_user', $id)->get('tb_lapor');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function tampilDataLapor()
	{
		$result = $this->db->get('tb_lapor');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function balasLap($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

}

/* End of file M_invoice.php */
/* Location: ./application/models/M_invoice.php */