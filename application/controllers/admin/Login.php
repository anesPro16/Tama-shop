<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		// jika sudah ada sesi maka arahkan ke controller admin/dashboard_admin
		if ($this->session->userdata('email')) {
			redirect('admin/dashboard_admin');
		}
		// atur validasi form
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Harap Mengisi Email',
			'valid_email' => 'Gunakan Email yang benar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Harap Mengisi Password'
		]);
		// jika validasi form gagal arahkan ke view admin/login
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Log In Amyrn Shop';
			$this->load->view('templates/login_header', $data);
			$this->load->view('admin/login');
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
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		// ada usernya
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
					$this->session->set_userdata($data);
					if ($user['id_peran'] == 1) {
						redirect('admin/dashboard_admin');
					} else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">id peran tidak diketahui!!</div>');
						redirect('admin/login');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Yah, Passwordnya Salah</div>');
					redirect('admin/login');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Maaf, akunnya diaktifin dulu ya!!</div>');
				redirect('admin/login');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf, Email tidak terdaftar!!</div>');
			redirect('admin/login');
		}
		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */