<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		dahLogin();
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index()
	{
		$data['judul']      = 'Dashboard';
		$data['anggota']    = $this->M_user->tampilData()->result_array();
		$data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengguna']   = $this->db->query("SELECT count(id) FROM user ")->result_array();
		$data['barang']     = $this->db->query("SELECT count(id_brg) FROM tb_barang ")->result_array();
		$data['stok']       = $this->db->query("SELECT sum(stok) FROM tb_barang ")->result_array();
		$data['avgStok']    = $this->db->query("SELECT avg(stok) FROM tb_barang ")->result_array();
		$data['aset']       = $this->db->query("SELECT sum(harga) FROM tb_barang ")->result_array();
		$data['ttlAset']    = $this->db->query("SELECT sum(total_harga) FROM tb_barang ")->result_array();
		$data['produk']     = $this->db->query("SELECT sum(jumlah) FROM tb_pesanan ")->result_array();
		$data['earn']       = $this->db->query("SELECT sum(total_bayar) FROM tb_invoice WHERE konfirmasi = 'Sudah Bayar' ")->result_array();
		$data['buyer']      = $this->db->query("SELECT count(id) FROM tb_invoice ")->result_array();
		$this->db->query("UPDATE `tb_barang` SET `total_harga`= `harga`*`stok` ");

		$data['produkLaku'] = $this->db->query("SELECT `nama_brg` FROM `tb_pesanan` ORDER BY jumlah DESC LIMIT 1 ")->result_array();

		$invoice = $this->M_invoice->getData('tb_invoice');
		if (!empty($invoice)) {
			foreach ($invoice as $inv) {
				$id = $inv->id;
				$batas_bayar = $inv->batas_bayar;
				$tglAwal = date_create($inv->tgl_pesan);
				$tglSkrg = date_create();
				$beda = date_diff($tglAwal, $tglSkrg);

				if ($beda->days > 1 && $tglAwal < $tglSkrg && $inv->konfirmasi == 'Belum Bayar') {
						$this->db->query("UPDATE `tb_barang` SET `total_harga`= `harga`*`stok` ");
						$this->db->query("UPDATE tb_barang, tb_pesanan, tb_invoice SET tb_barang.terjual=tb_barang.terjual-tb_pesanan.jumlah, tb_barang.stok=tb_barang.stok+tb_pesanan.jumlah WHERE tb_barang.id_brg=tb_pesanan.id_brg AND tb_pesanan.id_invoice='$id' ");
						$this->db->query("DELETE FROM tb_invoice WHERE id = '$id' ");
					}
					
			}

		}

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');

	}

	public function logOut()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_peran');
		$this->session->set_flashdata('pesan', '<div class="pesan pesan-kuning">Bye, Selamat Tinggal</div>');
		redirect('admin/login');
	}

}

/* End of file dashboard_admin.php */
/* Location: ./application/controllers/admin/dashboard_admin.php */