<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function getuser($data)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		return $this->db->get();
	}

	public function getwriter($writer)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $writer);
		return $this->db->get();
	}

	public function insertuser()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$telp = $this->input->post('telp');
		$address = $this->input->post('address');
		$password = $this->input->post('password');
		$retype = $this->input->post('repassword');
		if ($password != $retype) {
			$this->session->set_flashdata('flash', 'beda');
			redirect('auth/register');
		} else {
			$password = md5($password);
			$role = 'penulis';
			$data = [
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'telp' => $telp,
				'alamat' => $address,
				'city' => $city,
				'role' => $role
			];
		}
		if ($this->db->insert('users', $data)) {
			$success = 1;
		} else {
			$success = 0;
		}


		if ($success == 1) {
			$this->db->select('id');
			$this->db->from('users');
			$this->db->where('email', $email);
			$iduser = $this->db->get()->row_array();

			$data = [
				'iduser' => $iduser['id'],
				'rating' => 0
			];

			$this->db->insert('rating_penulis', $data);

			$data = [
				'iduser' => $iduser['id'],
				'testimoni' => ''
			];

			$this->db->insert('testimoni', $data);
		}
	}
}
