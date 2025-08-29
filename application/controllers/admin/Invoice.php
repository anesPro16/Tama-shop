<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		dahLogin();
		$data['judul'] = 'Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->db->query("SELECT * FROM tb_invoice")->result_array();
		$data['pesanan'] = $this->db->query("SELECT * FROM tb_pesanan")->result_array();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('templates_admin/footer');
	}

	public function prosesInv()
	{
		$data['judul'] = 'Proses Pesanan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$is_processed = $this->proses();
		if ($is_processed) {
			$id_invoice = $this->db->query("SELECT MAX(id) FROM tb_invoice")->result_array();
			$data['invoice'] = $this->M_invoice->ambilIdInv($id_invoice[0]['MAX(id)']);
			$data['pesanan'] = $this->M_invoice->ambilIdPesan($id_invoice[0]['MAX(id)']);
			$data['invPes'] = $this->M_invoice->joinData(['tb_invoice.id' => $id_invoice[0]['MAX(id)']])->result();
			$this->cart->destroy();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topnav', $data);
			$this->load->view('proses_pesanan');
			$this->load->view('templates/footer');
		} else {
			echo "Maaf, Pesanan gagal diproses!!!";
		}
		
	}

	public function pesananPdf($id_invoice)
	{
		$id_invoice = $this->uri->segment(4);
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

	private function proses() {
		$id      = $this->input->post('id');
		$nama    = $this->input->post('nama');
		$alamat  = $this->input->post('alamat');
		$ttlByr  = $this->input->post('grandTotal');
		$pilihan = $this->input->post('metode');
		$now     = date('Y-m-d');
		$invoice = array(
			'id_user'     => $id,
			'nama'        => $nama,
			'alamat'      => $alamat,
			'total_bayar' => $ttlByr,
			'tgl_pesan'   => $now,
			'batas_bayar' => date('Y-m-d', strtotime('+' . 1 . ' days', strtotime($now))),
			'waktu_bayar' => 0,
			'konfirmasi'  => 'Belum Bayar',
			'gambar'      => 'foto.png'
		);
		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_invoice' => $id_invoice,
				'id_brg'     => $item['id'],
				'nomor_resi' => $item['nomor_resi'],
				'nama_brg'   => $item['name'],
				'jumlah'     => $item['qty'],
				'harga'      => $item['price'],
				'pilihan'    => $pilihan,
				'status'     => 'Gudang'
			);
			$this->db->insert('tb_pesanan', $data);
		}
		return TRUE;
	}

	public function detail($id_invoice)
	{
		dahLogin();
		$data['judul'] = 'Detail Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->M_invoice->ambilIdInv($id_invoice);
		$data['pesanan'] = $this->M_invoice->ambilIdPesan($id_invoice);
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('templates_admin/footer');
	}

	public function konfirmasi($id)
	{
		dahLogin();
		$id = $this->uri->segment(4);
		$skrg = time();
		$this->db->set('konfirmasi', 'Sudah Bayar');
		$this->db->set('waktu_bayar', $skrg);
		$this->db->where('id', $id);
		$this->db->update('tb_invoice');
		redirect('admin/invoice','refresh');
	}

	public function hapus($id)
	{
		dahLogin();
		$where = array('id' => $id);
		$this->M_invoice->hapusInvoice($where, 'tb_invoice');
		redirect('admin/invoice','refresh');
	}

	public function detail_inv()
	{
		dahLogin();
		$data['judul'] = 'Detail Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->db->query("SELECT * FROM tb_invoice i, tb_pesanan p WHERE i.id=p.id_invoice")->result_array();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/detail_all_invoice', $data);
		$this->load->view('templates_admin/footer');
	}

	public function cetak_invoice()
	{
		dahLogin();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->db->query("SELECT * FROM tb_invoice")->result_array();
		$this->load->view('admin/cetak_pesanan', $data);
	}

	public function pdf_invoice()
	{
		dahLogin();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->db->query("SELECT * FROM tb_invoice")->result_array();
		// configurasi dompdf
		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/pustaka-booking/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf();
		$this->load->view('admin/pdf_invoice', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$dompdf->set_paper($paper_size, $orientation);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("Laporan_data_invoice.pdf", array('Attachment' =>0));
	}

	public function excel_invoice()
	{
		dahLogin();
		$data['title'] = 'Laporan Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->db->query("SELECT * FROM tb_invoice")->result_array();
		$this->load->view('admin/excel_invoice', $data);
	}


}

/* End of file Invoice.php */
/* Location: ./application/controllers/Invoice.php */