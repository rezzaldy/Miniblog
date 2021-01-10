<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->model('Auth_model');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$data =  array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
			);
			$this->login->login($data);
			// if ($user->num_rows() > 0) {
			// 	$row = $user->row();
			// 	$data  = array(
			// 		'id' => $row->id,
			// 		'username' => $row->username,
			// 		'email' => $row->email,
			// 		'ava' => $row->ava,
			// 		'role' => $row->role
			// 	);
			// 	$this->session->set_userdata($data);
			// 	if ($data['role'] == 'admin') {
			// 		redirect('administrator');
			// 	} elseif ($data['role'] == 'penulis') {
			// 		$writer = $data['id'];
			// 		$writerdata = $this->Auth_model->getwriter($writer);
			// 	}
			// } else {
			// 	echo "Login gagal";
			// }
		}
	}

	public function registerview()
	{
		$this->load->view('admin/register');
	}
	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'This email has already registered'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[repassword]', [
			'matches' => 'Password don\'t match',
			'min_length[4]' => 'Password too short'
		]);
		$this->form_validation->set_rules('repassword', 'Re-password', 'required|trim|matches[password]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('telp', 'Telephone', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('flash', 'failedregister');
			$this->load->view('admin/register');
		} else {
			$this->Auth_model->insertuser();
			$this->session->set_flashdata('flash', 'suksesregister');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->login->logout();
	}
}
