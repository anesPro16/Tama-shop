<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirim extends CI_Controller {

	public function index()
	{
		dahLogin();
		$data['judul']   = 'Pengiriman';
		$data['invoice'] = $this->M_invoice->tampilData();
		$data['pesanan'] = $this->M_invoice->tampilDataPsn();
		$data['invPes']  = $this->M_invoice->joinInvPes();
		$data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status']  = ['Gudang', 'Mengirim', 'Terkirim', 'Gagal'];
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/kirim', $data);
		$this->load->view('templates_admin/footer');
	}

	public function mengirim($id)
	{
		dahLogin();
		$id = $this->uri->segment(4);
		$this->db->set('status', 'Mengirim');
		$this->db->where('id', $id);
		$this->db->update('tb_pesanan');
		redirect('admin/kirim','refresh');
	}

	public function ubahSta($id)
	{
		dahLogin();
		$data['judul'] = 'Ubah Status Pengiriman';
		$data['pesanan'] = $this->M_invoice->tampilDataPsn();
		$data['status'] = ['Gudang', 'Mengirim', 'Terkirim', 'Gagal'];
		$where = array('id' => $id);
		$data['pesanan'] = $this->M_invoice->editSta($where, 'tb_pesanan')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/ubahSta', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update()
	{
		dahLogin();
		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('tb_pesanan');
		redirect('admin/kirim','refresh');
	}

	public function lapor()
	{
		$nama_brg = $this->input->post('nama_brg');
		$foto     = $_FILES['foto'];
		if ($foto = '') {} else {
			$config['upload_path'] = './assets/img/bukti/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = $nama_brg;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$foto = 'foto.png';
			} else {
				$foto = $this->upload->data('file_name');
			}
		}
		
		$data = array(
			'id_psn'     => $this->input->post('id'),
			'id_user'    => $this->input->post('id_user'),
			'nama'       => $this->input->post('nama'),
			'alamat'     => $this->input->post('alamat'),
			'nama_brg'   => $nama_brg,
			'masalah'    => $this->input->post('masalah'),
			'foto'       => $foto,
			'laporan'    => 'Sedang Diproses'
		);
		$this->db->insert('tb_lapor', $data);
		redirect('buyer');
	}

	public function laporAdm()
	{
		dahLogin();
		$data['judul'] = 'Laporan Produk';
		$data['lapor'] = $this->db->query("SELECT * FROM tb_lapor")->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/riwayat', $data);
		$this->load->view('templates_admin/footer');
	}

	public function balasan($id)
	{
		dahLogin();
		$data['judul'] = 'Halaman Balas Laporan';
		$data['lapor'] = $this->M_invoice->tampilDataLapor();
		$where = array('id' => $id);
		$data['lapor'] = $this->M_invoice->balasLap($where, 'tb_lapor')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/balasan', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updateLap()
	{
		dahLogin();
		$id = $this->input->post('id');
		$balasan = $this->input->post('balasan');
		$this->db->set('laporan', 'Laporan Diterima');
		$this->db->set('balasan', $balasan);
		$this->db->where('id', $id);
		$this->db->update('tb_lapor');
		redirect('admin/kirim/laporAdm');
	}

}

/* End of file kirim.php */
/* Location: ./application/controllers/admin/kirim.php */