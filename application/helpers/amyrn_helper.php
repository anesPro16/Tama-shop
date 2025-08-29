<?php

function dahLogin()
{
	$CI =& get_instance();
	if (!$CI->session->userdata('email')) {
		$CI->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Harap Log In terlebih dulu!!</div>');
		redirect('auth');
	} else {
		$id_peran = $CI->session->userdata('id_peran');
		$menu = $CI->uri->segment(1);

		$queryMenu = $CI->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$id_menu = $queryMenu['id'];

		$userAkses = $CI->db->get_where('user_akses_menu', [
			'id_peran' => $id_peran,
			'id_menu' => $id_menu
		]);

		if ($userAkses->num_rows() < 1) {
			redirect('auth/tahan');
		}
	}

	function cek_akses($id_peran, $idmenu)
	{
		$CI =& get_instance();

		$CI->db->where('id_peran', $id_peran);
		$CI->db->where('id_peran', $id_peran);
		$result = $CI->db->get('user_akses_menu');

		if ($result->num_rows() > 0) {
			return "checked='checked'";
		}
	}
	
}