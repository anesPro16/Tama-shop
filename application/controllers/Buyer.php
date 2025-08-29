<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'home';
		$data['barang'] = $this->M_barang->tampilData()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('buyer', $data);
		$this->load->view('templates/footer');
	}

	public function cari()
	{
		$data['judul'] = 'Pencarian Barang';
		$data['barang'] = $this->M_barang->getAllBrg();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kataKunci', 'Kata Kunci', 'required',
			['required' => 'Kalo Mau Cari, diisi dulu Ya']
		);

		if ($this->form_validation->run() == false) {
			$data['barang'] = $this->M_barang->tampilData()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topnav', $data);
			$this->load->view('buyer', $data);
			$this->load->view('templates/footer');
		} else {
			$this->input->post('kataKunci'); 
			$data['barang'] = $this->M_barang->cariBrg();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topnav', $data);
			$this->load->view('cari', $data);
			$this->load->view('templates/footer');
		}
	}

	public function detail($id_brg)
	{
		$data['judul'] = 'Detail Produk';
		$data['barang'] = $this->M_barang->detailBrg($id_brg);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('detail_barang' ,$data);
		$this->load->view('templates/footer');
	}

	public function profil()
	{
		dahLogin();
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('profil', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		dahLogin();
		$data['judul'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'min_length[3]',
			['min_length' => 'Nama terlalu sedikit']
		);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topnav', $data);
			$this->load->view('edit', $data);
			$this->load->view('templates/footer');
		} else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$email = $this->input->post('email');

			// cek apakah gambar sudah diupload
			$upload_image = $_FILES['foto']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$old_image = $data['user']['foto'];
					if ($old_image != 'foto.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			// ubah nama sesuai dengan $nama
			$this->db->set('nama', $nama);
			// memilih data berdasarkan $email
			$this->db->where('email', $email);
			// update data berdasarkan tabel user
			$this->db->update('user');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success col-sm-3" role="alert">Baik, berhasil ubah profil</div>');
			redirect('buyer/profil');
		}
	}

	public function addCart($id)
	{
		dahLogin();
		$barang = $this->M_barang->find($id);
		$data['barang'] = $this->M_barang->detailBrg($id);
		foreach ($data['barang'] as $key => $brg) {
			// cek apakah stok ada
			if ($brg->stok == 0) {
				$this->session->set_flashdata('pesan', '<script>alert("gagal Memesan");</script>');
				redirect('buyer');
				return false;
			}
		}

		$nomor_resi = mt_rand(100000, 999999);
		$data = array(
			'id'         => $barang->id_brg,
			'qty'        => 1,
			'price'      => $barang->harga,
			'name'       => $barang->nama_brg,
			'nomor_resi' => $nomor_resi
		);
		
		$this->cart->insert($data);
		$this->session->set_flashdata('pesan', '<script>alert("Berhasil Memesan");</script>');
		redirect('buyer');
	}

	public function addCart2($id)
	{
		dahLogin();
		$barang = $this->M_barang->find($id);
		$nomor_resi = mt_rand(100000, 999999);
		$data = array(
			'id'         => $barang->id_brg,
			'qty'        => 1,
			'price'      => $barang->harga,
			'name'       => $barang->nama_brg,
			'nomor_resi' => $nomor_resi
		);
		
		$this->cart->insert($data);
		redirect('buyer/detail_keranjang');
	}

	public function kurangi($id)
	{
		dahLogin();
		$barang = $this->M_barang->find($id);
		$nomor_resi = mt_rand(100000, 999999);
		foreach ($this->cart->contents() as $item) {
			$item['qty'] = -1;
			$data = array(
				'id'         => $barang->id_brg,
				'qty'        => $item['qty'],
				'price'      => $barang->harga,
				'name'       => $barang->nama_brg,
				'nomor_resi' => $nomor_resi
			);
			$this->cart->insert($data);
			
			redirect('buyer/detail_keranjang');
		}
	}

	public function dropCart()
	{
		$this->cart->destroy();
		redirect('buyer','refresh');
	}

	public function detail_keranjang()
	{
		dahLogin();
		$data['judul'] = 'Detail keranjang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function pembayaran()
	{
		dahLogin();
		$data['judul'] = 'Pembayaran';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}

	public function pesanan($id)
	{
		dahLogin();
		$data['judul'] = 'Halaman Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$invoice = $this->M_invoice->find($id);
		$data['invoice'] = $this->M_invoice->detailInv($id);
		$data['pesanan'] = $this->M_invoice->tampilDataPsn();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('pesanan', $data);
		$this->load->view('templates/footer');
	}

	public function pesananPdf($id_invoice)
	{
		$id_invoice = $this->uri->segment(3);
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$nama = $user['nama'];
		$data['invoice'] = $this->M_invoice->ambilIdInv($id_invoice);
		$data['pesanan'] = $this->M_invoice->ambilIdPesan($id_invoice);
		$data['invPes'] = $this->M_invoice->joinData(['tb_invoice.id' => $id_invoice])->result();
		$data['nama'] = $nama;
		
		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot. '/Tama_shop/application/third_party/dompdf/autoload.inc.php';
		$dompdf = new Dompdf\Dompdf();
		$this->load->view('pesanan-pdf', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$dompdf->set_paper($paper_size, $orientation);
		// konversi ke pdf
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("pesanan-pdf-$nama.pdf-$id_invoice", array('Attachment' => 0));
	}

	public function lapor($id_invoice)
	{
		dahLogin();
		$data['judul'] = 'Halaman Komplein Pesanan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->M_invoice->ambilIdInv($id_invoice);
		$data['pesanan'] = $this->db->query("SELECT * FROM tb_pesanan WHERE id='$id_invoice' ")->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('lapor', $data);
		$this->load->view('templates/footer');
	}

	public function detailInv($id_invoice)
	{
		dahLogin();
		$data['judul'] = 'Detail Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->M_invoice->ambilIdInv($id_invoice);
		$data['pesanan'] = $this->M_invoice->ambilIdPesan($id_invoice);
		$data['invPes'] = $this->M_invoice->joinData(['tb_invoice.id' => $id_invoice])->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('detail_invoice', $data);
		$this->load->view('templates/footer');
	}

	public function updateFoto()
	{
		$id = $this->input->post('id');
		$data['invoice'] = $this->db->get_where('tb_invoice', ['id' => $id])->row_array();
		// cek apakah gambar telah diupload
		$upload_image = $_FILES['gambar']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/bukti/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$old_image = $data['invoice']['gambar'];
				if ($old_image != 'pay.png') {
					unlink(FCPATH . 'assets/img/bukti/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('gambar', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->where('id', $id);
		$this->db->update('tb_invoice');
		redirect('buyer');
	}

	public function riwayat($id)
	{
		dahLogin();
		$data['judul'] = 'Halaman Riwayat Komplein Barang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$lapor = $this->M_invoice->riwayat($id);
		$data['lapor'] = $this->M_invoice->detailRiw($id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('riwayat', $data);
		$this->load->view('templates/footer');
	}

	public function kontak()
	{
		$data['judul'] = 'Kontak Kami';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topnav', $data);
		$this->load->view('kontak', $data);
		$this->load->view('templates/footer');

	}

}

/* End of file Buyer.php */
/* Location: ./application/controllers/Dashboard.php */