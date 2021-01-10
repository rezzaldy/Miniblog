<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->model("Admin_model");
		$this->load->model("User_model");
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$category = $this->Admin_model->getAllCategory();
		$post = $this->db->get('post')->result_array();

		foreach ($category as $cate) {
			$categoryinput = $cate['nama'];
			$count = 0;
			foreach ($post as $pt) {
				if ($cate['id'] == $pt['idkategori']) {
					$count = $count + 1;
				}
			}

			$field[] = (object) [
				'kategori' => $categoryinput,
				'count' => $count
			];
		}

		$data['read'] = $this->Admin_model->countReadByUser($id);
		$data['postuser'] = $this->Admin_model->countPostByUser($id);
		$data['countcomment'] = $this->Admin_model->countComment($id);
		$data['countpostbykategori'] = $field;
		$data['user'] = $this->Admin_model->getuser($id);
		$data['countuser'] = $this->User_model->countUserRegistered();
		$data['countpost'] = $this->User_model->countPost();
		$data['countcategory'] = $this->User_model->countCategory();
		$data['posting'] = $this->Admin_model->getpostbyuserid($id);
		$data['sidebar'] = 'dashboard';
		$data['title'] = 'DASHBOARD';
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/navbar', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/admin/footer');
	}


	public function category()
	{
		if ($this->session->userdata('role') == 'admin') {
			if ($this->input->post('category')) {
				$this->Admin_model->addcategory();
				$this->session->set_flashdata('flash', 'category');
			} elseif ($this->input->post('editcategory')) {
				$this->Admin_model->editcategory();
				$this->session->set_flashdata('flash', 'category');
			}

			$id = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($id);
			$data['category'] = $this->Admin_model->getAllCategory();
			$data['sidebar'] = 'category';
			$data['title'] = 'CATEGORY';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/category', $data);
			$this->load->view('template/admin/footer');
		} else {
			$this->load->view('errors/error');
		}
	}
	public function editava()
	{
		# code...
		$id = $this->session->userdata('id');
		$this->Admin_model->editava($id);
		$this->session->set_flashdata('flash', 'successeditava');
		redirect('administrator/editprofile');
	}
	public function editprofile()
	{
		$id = $this->session->userdata('id');
		if ($this->input->post('username')) {
			$this->Admin_model->editdata($id);
			$this->session->set_flashdata('flash', 'successeditdata');
		}
		$data['user'] = $this->Admin_model->getuser($id);

		$data['sidebar'] = 'editprofile';
		$data['title'] = 'EDIT PROFILE';
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/navbar', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('admin/editprofile', $data);
		$this->load->view('template/admin/footer', $data);
	}

	public function delete($id)
	{
		if ($this->session->userdata('role') == 'admin') {
			$this->Admin_model->deletecategory($id);
			$this->session->set_flashdata('flash', 'categorydelete');
			redirect('administrator/category');
		} else {
			$this->load->view('errors/error');
		}
	}

	public function resetpassword()
	{
		if ($this->session->userdata('role') == 'admin') {
			$id = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($id);
			$data['writers'] = $this->Admin_model->getAllWriter();
			$data['sidebar'] = 'resetpassword';
			$data['title'] = 'RESET WRITERS PASSWORD';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/resetpassword', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			$this->load->view('errors/error');
		}
	}

	public function generatepassword($id)
	{
		if ($this->session->userdata('role') == 'admin') {
			$getuserbyid = $this->Admin_model->getuser($id);
			$new = random_string('alnum', 8);

			$this->load->library('ciqrcode'); //memanggil library QR code

			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = './assets/img/newpass/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '171'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = md5($new) . '.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = 'Halo,' . $getuserbyid['username'] . '
		Password kamu berhasil di reset, akhirnya kamu bisa menulis lagi,
		Selamat Menulis 
		>>>> (PASSWORD BARU    = ' . $new . ') <<<<'; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/\

			if ($this->ciqrcode->generate($params)) {
				$this->Admin_model->resetpassword($id, $new);
				$this->session->set_flashdata('flash', 'reset');
				if ($getuserbyid['role'] == 'admin') {
					$password = $getuserbyid['password'];
					$filename = './assets/img/newpass/' . $password . '.png';
					force_download($filename, null);
					redirect('administrator/editprofile');
				} elseif ($getuserbyid['role'] == 'penulis') {
					redirect('administrator/resetpassword');
				}
			}
		} else {
			$this->load->view('errors/error');
		}
	}

	public function downloadQrCode($filename)
	{
		$filename = './assets/img/newpass/' . $filename . '.png';
		force_download($filename, null);
	}
	public function write()
	{
		if ($this->session->userdata('role') == 'penulis') {
			$id = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($id);
			$data['category'] = $this->Admin_model->getAllCategory();
			$data['sidebar'] = 'write';
			$data['title'] = 'TAMBAHKAN POSTINGAN';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/write', $data);
			$this->load->view('template/admin/footer');
		} else {
			$this->load->view('errors/error');
		}
	}

	public function insertwrite()
	{
		if ($this->session->userdata('role') == 'penulis') {
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');
			if ($this->form_validation->run() == FALSE) {
				$id = $this->session->userdata('id');
				$data['user'] = $this->Admin_model->getuser($id);
				$data['category'] = $this->Admin_model->getAllCategory();
				$data['sidebar'] = 'write';
				$data['title'] = 'TAMBAHKAN POSTINGAN';
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/navbar', $data);
				$this->load->view('template/admin/sidebar', $data);
				$this->load->view('admin/write', $data);
				$this->load->view('template/admin/footer');
			} else {
				$id = $this->session->userdata('id');
				$this->Admin_model->insertpost($id);
				$this->session->set_flashdata('flash', 'insert');
				redirect('administrator/write');
			}
		} else {
			$this->load->view('errors/error');
		}
	}

	public function post()
	{
		if ($this->session->userdata('role') == 'penulis') {
			$id = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($id);
			$data['posting'] = $this->Admin_model->getpostbyuserid($id);
			$data['title'] = "LIST POSTINGAN";
			$data['sidebar'] = 'list';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/listpost', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			$this->load->view('errors/error');
		}
	}

	public function detail($idpost)
	{
		if ($this->session->userdata('role') == 'penulis') {
			$id = $this->session->userdata('id');
			$this->Admin_model->updateviews($idpost);
			$data['user'] = $this->Admin_model->getuser($id);
			$data['detailpostingan'] = $this->Admin_model->getpostbyid($idpost);
			$data['title'] = "DETAIL POSTINGAN";
			$data['sidebar'] = '';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/detailpost', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			$this->load->view('errors/error');
		}
	}

	public function deletepost($id)
	{
		if ($this->session->userdata('role') == 'penulis') {
			$this->Admin_model->deletepost($id);
			$this->session->set_flashdata('flash', 'postdelete');
			redirect('administrator/post');
		} else {
			$this->load->view('errors/error');
		}
	}

	public function vieweditpost($idpost)
	{
		if ($this->session->userdata('role') == 'penulis') {
			$id = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($id);
			$data['category'] = $this->Admin_model->getAllCategory();
			$data['postingan'] = $this->Admin_model->getpostbyid($idpost);
			$data['sidebar'] = 'edit';
			$data['title'] = 'EDIT POSTINGAN';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/editpost', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			$this->load->view('errors/error');
		}
	}

	public function insertupdate()
	{
		if ($this->session->userdata('role') == 'penulis') {
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');
			if ($this->form_validation->run() == FALSE) {
				$id = $this->session->userdata('id');
				$data['user'] = $this->Admin_model->getuser($id);
				$data['category'] = $this->Admin_model->getAllCategory();
				$data['sidebar'] = 'write';
				$data['title'] = 'TAMBAHKAN POSTINGAN';
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/navbar', $data);
				$this->load->view('template/admin/sidebar', $data);
				$this->load->view('admin/write', $data);
				$this->load->view('template/admin/footer');
			} else {
				$id = $this->session->userdata('id');
				$this->Admin_model->updatepost($id);
				$this->session->set_flashdata('flash', 'insert');
				redirect('administrator/write');
			}
		} else {
			$this->load->view('errors/error');
		}
	}

	public function comment()
	{
		if ($this->session->userdata('role') == 'penulis') {
			$id = $this->session->userdata('id');
			$data['user'] = $this->Admin_model->getuser($id);
			$data['comment'] = $this->Admin_model->getComment($id);
			$data['sidebar'] = 'comment';
			$data['title'] = 'LIST KOMENTAR';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/listcomment', $data);
			$this->load->view('template/admin/footer');
		} else {
			$this->load->view('errors/error');
		}
	}

	public function deletecomment($id)
	{
		if ($this->session->userdata('role') == 'penulis') {
			$this->Admin_model->deletecomment($id);
			$this->session->set_flashdata('flash', 'commentdelete');
			redirect('administrator/comment');
		} else {
			$this->load->view('errors/error');
		}
	}

	public function testimoni()
	{
		if ($this->session->userdata('role') == 'penulis') {
			$id = $this->session->userdata('id');
			if ($this->input->post('testimoni') || $this->input->post('testimoniedit')) {
				$this->Admin_model->addtestimoni();
			}
			$data['testimoni'] = $this->Admin_model->getTesti($id);
			$data['user'] = $this->Admin_model->getuser($id);
			$data['sidebar'] = 'testimoni';
			$data['title'] = 'TESTIMONI';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/navbar', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('admin/testimoni', $data);
			$this->load->view('template/admin/footer');
		} else {
			$this->load->view('errors/error');
		}
	}
}
