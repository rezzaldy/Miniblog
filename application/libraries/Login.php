<?php if (!defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Login
{
	var $CI = NULL;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function login($data)
	{
		$query = $this->CI->db->get_where('users', array('username' => $data['username'], 'password' => $data['password']));
		if ($query->num_rows() == 1) {
			$row = $query->row();
			$id  = $row->id;
			$username = $row->username;
			$role = $row->role;

			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('id', $id);
			$this->CI->session->set_userdata('role', $role);
			redirect('administrator');
		} else {
			$this->CI->session->set_flashdata('flash', 'salah');
			redirect('auth');
		}
	}
	public function ceklogin()
	{
		if ($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('flash', 'belum');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id');
		redirect(base_url());
	}
}
