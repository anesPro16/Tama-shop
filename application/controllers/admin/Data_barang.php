<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		dahLogin();
	}

	public function index()
	{
		$data['judul'] = 'Data Barang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = ['Sembako', 'Makanan', 'Minuman', 'Plastik'];
		$this->load->model('M_barang', 'brg');
		// pagination
		$this->load->library('pagination');
		// setting base_url
		$config['base_url']        = 'http://localhost/Tama_shop/admin/data_barang/index';
		$config['total_rows']      = $this->brg->itungAllBrg();
		$config['per_page']        = 7;
		$config['full_tag_open']   = '<nav><ul class="pagination justify-content-center"> ';
		$config['full_tag_close']  = '</ul></nav>';
		
		$config['first_link']      = 'First';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link']       = 'Last';
		$config['last_tag_open']   = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';
		
		$config['next_link']       = '<i class="fa fa-arrow-right-long"></i>';
		$config['next_tag_open']   = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';
		
		$config['prev_link']       = '<i class="fa fa-arrow-left-long"></i>';
		$config['prev_tag_open']   = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';
		
		$config['cur_tag_open']    = '<li class="page-item active"><a class="page-link" href="">';
		$config['cur_tag_close']   = '</a></li">';
		
		$config['num_tag_open']    = '<li class="page-item">';
		$config['num_tag_close']   = '</li">';
		
		$config['attributes'] = array('class' => 'page-link');
				
		// initialize
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(4);
		$data['barang'] = $this->brg->getBrg($config['per_page'], $data['start']);

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required', [
			'required' => 'Nama Barang Harus Diisi!!!'
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
			'required' => 'Keterangan Harus Diisi!!!'
		]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', [
			'required' => 'kategori Harus Dipilih!!!'
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', [
			'required' => 'Harga Harus Diisi!!!'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok Harus Diisi!!!'
		]);

		if ($this->form_validation->run() == false) {
			$this->index(); 
		} else {

				$nama_brg   = $this->input->post('nama_brg');
				$keterangan = $this->input->post('keterangan');
				$kategori   = $this->input->post('kategori');
				$harga      = $this->input->post('harga');
				$stok       = $this->input->post('stok');
				$gambar     = $_FILES['gambar'];
				$huruf= explode(" ", $nama_brg);
				$kode =''.substr($kategori, 0, 1);
				foreach ($huruf as $h) {$kode.=substr($h, 0,1);}

				if ($gambar = '') {} else {
					$config['upload_path'] = './assets/img/upload/';
					$config['allowed_types'] = 'jpg|jpeg|png|PNG';
					$config['file_name'] = $nama_brg;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('gambar')) {
						$gambar = 'foto.png';
					} else {
						$gambar = $this->upload->data('file_name');
					}
				}
				
				$data = array(
					'nama_brg'    => $nama_brg,
					'kode_brg'    => $kode . $this->M_barang->KodeOtomatis('tb_barang', 'id_brg'),
					'keterangan'  => $keterangan, 
					'kategori'    => $kategori, 
					'harga'       => $harga, 
					'stok'        => $stok,
					'total_harga' => $harga*$stok,
					'terjual'     => 0,
					'gambar'      => $gambar
				);
				$this->M_barang->addBarang($data, 'tb_barang');
				$this->session->set_flashdata('pesan', '<div class="pesan pesan-sukses col-lg-3">Mantap, berhasil menambah barang</div>');
				redirect('admin/data_barang/index','refresh');
			}
	}

	public function edit($id)
	{
		$data['judul'] = 'Edit Data Barang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_brg' => $id);
		$data['barang'] = $this->M_barang->editBarang($where, 'tb_barang')->result();
		$data['kategori'] = ['Sembako', 'Makanan', 'Minuman', 'Plastik'];

		$this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required', [
			'required' => 'Nama Barang Harus Diisi!!!'
		]);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
			'required' => 'Keterangan Harus Diisi!!!'
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required', [
			'required' => 'Harga Harus Diisi!!!'
		]);
		$this->form_validation->set_rules('stok', 'Stok', 'required', [
			'required' => 'Stok Harus Diisi!!!'
		]);

		if ($this->form_validation->run() == false) {
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
		} else {
			$this->update();
		}
	}

	public function update()
	{
		$id         = $this->input->post('id_brg');
		$nama_brg   = $this->input->post('nama_brg');
		$keterangan = $this->input->post('keterangan');
		$kategori   = $this->input->post('kategori');
		$harga      = $this->input->post('harga');
		$stok       = $this->input->post('stok');
		$gambar     = $_FILES['gambar']['name'];
		
		if ($gambar) {
				$config['allowed_types'] = 'jpg|jpeg|png|PNG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/upload/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$old_image = $data['tb_barang']['gambar'];
					if ($old_image != $gambar) {
						unlink(FCPATH . 'assets/img/upload/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
		
		$data = array(
			'nama_brg'   => $nama_brg,
			'keterangan' => $keterangan,
			'kategori'   => $kategori,
			'harga'      => $harga,
			'stok'       => $stok,
			'total_harga'=> $harga*$stok
		);

		$where = array('id_brg' => $id);

		$this->M_barang->updateData($where, $data, 'tb_barang');
		$this->session->set_flashdata('pesan', '<div class="pesan pesan-sukses col-lg-3">Yeah, berhasil mengubah barang</div>');
		redirect('admin/data_barang/index');
	}

	public function hapus($id)
	{
		$where = array('id_brg' => $id);
		$this->M_barang->hapusData($where, 'tb_barang');
		redirect('admin/data_barang/index','refresh');
	}

}

/* End of file Data_barang.php */
/* Location: ./application/controllers/admin/Data_barang.php */