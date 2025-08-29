<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function dataSembako()
	{
		return $this->db->get_where('tb_barang', array('kategori' => 'sembako'));
	}

	public function dataMakanan()
	{
		return $this->db->get_where('tb_barang', array('kategori' => 'makanan'));
	}

	public function dataMinuman()
	{
		return $this->db->get_where('tb_barang', array('kategori' => 'minuman'));
	}


}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */