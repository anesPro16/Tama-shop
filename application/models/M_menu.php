<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

	public function tampilData()
	{
		return $this->db->get('user_menu');
	}

	public function getDataMenu($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('user_menu');
		return $query->row();
	}

	public function addMenu($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function editMenu($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function updateMenu($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update('user_menu', $data);
	}

	public function hapusMenu($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getSubmenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
		FROM `user_sub_menu` JOIN `user_menu`
		ON `user_sub_menu`.`id_menu` = 	`user_menu`.`id`
		";
		return $this->db->query($query)->result_array();
	}

	public function editSubMenu($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function updateSubMenu($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update('user_sub_menu', $data);
	}

	public function hapusSubMenu($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file M_menu.php */
/* Location: ./application/models/M_menu.php */