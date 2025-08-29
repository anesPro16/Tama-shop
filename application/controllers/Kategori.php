<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function sembako()
	{
		$data['judul'] = 'Data Sembako';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sembako'] = $this->M_kategori->dataSembako()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('kategori/sembako', $data);
		$this->load->view('templates/footer');
	}

	public function makanan()
	{
		$data['judul'] = 'Data Makanan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['makanan'] = $this->M_kategori->dataMakanan()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('kategori/makanan', $data);
		$this->load->view('templates/footer');
	}

	public function minuman()
	{
		$data['judul'] = 'Data Minuman';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['minuman'] = $this->M_kategori->dataMinuman()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('kategori/minuman', $data);
		$this->load->view('templates/footer');
	}


}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */