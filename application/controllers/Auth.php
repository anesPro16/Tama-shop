<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('unit_test');
	}

	public function index()
	{
		// jika sudah ada sesi maka arahkan user ke controller buyer
		if ($this->session->userdata('email')) {
			redirect('buyer');
		}
		// atur validasi form
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required'    => 'Harap Mengisi Email',
			'valid_email' => 'Gunakan Email yang benar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Harap Mengisi Password'
		]);
		// jika validasi form gagal arahkan ke view auth/login
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Tama Shop';
			$this->load->view('templates/login_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/login_footer');
		} else {
			// validasi benar
			$this->unikLogin();
		}
	}

	private function unikLogin()
	{
		$email = $this->input->post('email'); // dapatkan nilai dari variabel email
		$password = $this->input->post('password'); // dapatkan nilai dari variabel password
		// ambil data user dari tabel user yang dimana email sama dengan $email lalu kembalikan 1 baris data user.  
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		// jika ada usernya
		if ($user) {
			// jika user aktif
			if ($user['aktif'] == 1) {
				# cek pw
				if (password_verify($password, $user['password'])) {
					// simpan  data email, id_peran ke dalam variabel data
					$data = [
						'email' => $user['email'],
						'id_peran' => $user['id_peran']
					];
					$this->session->set_userdata($data); // buat data session dengan nama $data
					if ($user['id_peran'] == 2) {
						redirect('buyer');
					} else{
						// perintah untuk mengatur flashdata
						$this->session->set_flashdata('pesan', '<div class="pesan pesan-buy">id peran tidak diketahui!!</div>');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="pesan pesan-buy">Yah, Passwordnya Salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="pesan pesan-kuning">Maaf, akunnya diaktifin dulu ya!!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="pesan pesan-buy">Maaf, Email tidak terdaftar!!</div>');
			redirect('auth');
		}
		
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('buyer');
		}

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
			'required'  => 'Harap Mengisi Nama'
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',[
			'required'  => 'Harap Mengisi Email',
			'is_unique' => 'Email sudah pernah digunakan!!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
			'required'  => 'Harap Mengisi Alamat'
		]);
		$this->form_validation->set_rules('noHp', 'No Hp', 'trim|required|numeric', [
			'required' => 'Harap Mengisi No Hp',
			'numeric'  => 'Masukkan angka!!'
		]);

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
			'required'   => 'Harap Mengisi password',
			'matches'    => 'Password Tak Sama!!',
			'min_length' => 'Harus 8 digit!!'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]', [
			'required' => 'Harap Mengisi password',
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pendaftaran Tama Shop';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/daftar');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'nama'     => htmlspecialchars($this->input->post('nama', true)),
				'email'    => htmlspecialchars($email),
				'alamat'   => htmlspecialchars($this->input->post('alamat', true)),
				'no_hp'    => htmlspecialchars($this->input->post('noHp', true)),
				'foto'     => 'foto.jpg',
				'aktif'    => 1,
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'id_peran' => 2,
				'waktu'    => date('Y-m-d H:i:s')
			];

			$this->M_user->addUser($data, 'user');
			$this->session->set_flashdata('pesan', '<div class="pesan pesan-sukses">Berhasil daftar akun. Silakan Login!!</div>');
			redirect('auth');
		}
	}

	public function logOut()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_peran');
		$this->session->set_flashdata('pesan', '<div class="pesan pesan-kuning">Bye, Selamat Tinggal</div>');
		redirect('auth');
	}

	public function tahan()
	{
		$data['judul'] = 'area Terlarang';
		$this->load->view('templates/header', $data);
		$this->load->view('auth/tahan');
		$this->load->view('templates/auth_footer');
	}
	
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */