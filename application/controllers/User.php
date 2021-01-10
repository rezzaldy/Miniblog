<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->model("User_model");
		$this->load->model("Admin_model");
	}

	private function back()
	{
		if (isset($_SERVER['HTTP_REFERER'])) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			header('Location: http://' . $_SERVER['SERVER_NAME']);
		}
		exit;
	}

	public function index()
	{
		if ($this->session->userdata('id')) {
			$iduser = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($iduser);
		}
		$data['countuser'] = $this->User_model->countUserRegistered();
		$data['userfavorite'] = $this->User_model->getRatingUser();
		$data['post'] = $this->User_model->countPost();
		$data['countcategory'] = $this->User_model->countCategory();
		$data['threepost'] = $this->User_model->getThreePost();
		$data['kategori'] = $this->User_model->getAllCategory();
		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar', $data);
		$this->load->view('user/home', $data);
		$this->load->view('template/user/footer', $data);
	}

	public function categories($id)
	{
		if ($this->session->userdata('id')) {
			$iduser = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($iduser);
		}
		$data['categories'] = $this->User_model->getAllCategory();
		$data['post'] = $this->User_model->getPostAllPostByCategory($id);
		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar', $data);
		$this->load->view('user/categories', $data);
		$this->load->view('template/user/footer', $data);
	}

	public function postcategory($id)
	{
		if ($this->session->userdata('id')) {
			$iduser = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($iduser);
		}
		$this->User_model->updateviews($id);
		$data['postcategory'] = $this->User_model->getPostById($id);
		$data['comments'] = $this->User_model->getCommentById($id);
		$data['threepost'] = $this->User_model->getThreePost();
		$data['categories'] = $this->User_model->getAllCategory();
		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar', $data);
		$this->load->view('user/postcategory', $data);
		$this->load->view('template/user/footer', $data);
	}

	public function comment($id)
	{
		$this->User_model->addComment($id);
		$this->back();
	}

	public function allpost()
	{
		if ($this->session->userdata('id')) {
			$id = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($id);
		}
		//load Pagination
		$this->load->library('pagination');

		if ($this->input->post('keyword')) {
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = '';
		}

		$config['base_url'] = 'http://localhost/miniblog/user/allpost';

		$this->db->like('judul', $data['keyword']);
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('users', 'users.id = post.idpenulis');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 6;

		$data['start'] = $this->uri->segment(3);

		$data['post'] = $this->User_model->getAllPost($config['per_page'], $data['start'], $data['keyword']);

		$this->pagination->initialize($config);
		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar', $data);
		$this->load->view('user/allpost', $data);
		$this->load->view('template/user/footer', $data);
	}

	public function addrating()
	{
		$id = $this->input->post('idpenulis');
		$this->User_model->addrating($id);
		$this->back();
	}

	public function contact()
	{
		if ($this->session->userdata('id')) {
			$iduser = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($iduser);
		}
		$data['admin'] = $this->User_model->getAdmin();
		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar', $data);
		$this->load->view('user/contact', $data);
		$this->load->view('template/user/footer', $data);
	}

	public function penulis($id)
	{
		if ($this->session->userdata('id')) {
			$iduser = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($iduser);
		}
		$data['authorpost'] = $this->User_model->getPostAuthor($id);
		$data['userprofile'] = $this->User_model->getAuthorById($id);
		$this->load->view('template/user/header', $data);
		$this->load->view('template/user/navbar', $data);
		$this->load->view('user/author', $data);
		$this->load->view('template/user/footer', $data);
	}
}
