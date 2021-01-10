<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function getuser($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}

	public function getAllCategory()
	{
		return $this->db->get('kategori')->result_array();
	}

	public function addcategory()
	{
		$category = $this->input->post('category');

		$data = [
			'nama' => $category,
		];
		$this->db->insert('kategori', $data);
	}
	public function editcategory()
	{
		$editcategory = $this->input->post('editcategory');
		$id = $this->input->post('idcategory');
		$data = [
			'nama' => $editcategory
		];
		$this->db->where('kategori.id', $id);
		$this->db->update('kategori', $data);
	}
	public function deletecategory($id)
	{
		$this->db->where('kategori.id', $id);
		$this->db->delete('kategori');
	}

	public function getAllWriter()
	{
		return $this->db->get_where('users', array('role' => 'penulis'))->result_array();
	}

	public function resetpassword($id, $new)
	{
		$newpassword = md5($new);
		$this->db->set('password', $newpassword);
		$this->db->where('id', $id);
		$this->db->update('users');
	}
	public function editava($id)
	{
		$ava = $_FILES['image'];
		if ($ava == "") {
			echo 'Gambar tidak boleh kosong';
		} else {
			$config['upload_path'] = './assets/img/user';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				echo "Upload gagal, silahkan coba lagi atau hubungi developer";
				die();
			} else {
				$ava = $this->upload->data('file_name');
			}
			$data = [
				'ava' => $ava
			];
			$this->db->where('id', $id);
			$this->db->update('users', $data);
		}
	}
	public function editdata($id)
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$city = $this->input->post('city');

		$data = [
			'username' => $username,
			'email' => $email,
			'telp' => $telp,
			'alamat' => $alamat,
			'city' => $city
		];

		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	public function insertpost($id)
	{
		$title = $this->input->post('title');
		$category = $this->input->post('category');
		$text = $this->input->post('text');
		$images = $_FILES['images']['name'];
		if (!empty($images)) {
			$config['upload_path'] = './assets/img/post';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('images')) {
				echo "Upload gambar gagal silahkan hubungi developer";
				die();
			} else {
				$images = $this->upload->data('file_name');
			}
		} else {
			$images = '';
		}
		$data = [
			'judul' => $title,
			'idkategori' => $category,
			'isi_post' => $text,
			'file_gambar' => $images,
			'tgl_insert' => time(),
			'tgl_update' => time(),
			'idpenulis' => $id,
			'read' => 0
		];

		$this->db->insert('post', $data);
	}

	public function getpostbyuserid($id)
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('kategori', 'post.idkategori = kategori.id');
		$this->db->where('idpenulis', $id);
		return $this->db->get()->result_array();
	}

	public function getpostbyid($idpost)
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('kategori', 'post.idkategori = kategori.id');
		return $this->db->where('idpost', $idpost)->get()->row_array();
	}

	public function deletepost($id)
	{
		$this->db->where('post.idpost', $id);
		$this->db->delete('post');
	}

	public function updatepost($id)
	{
		$idpost = $this->input->post('idpost');
		$title = $this->input->post('title');
		$category = $this->input->post('category');
		$rating = $this->input->post('rating');
		$text = $this->input->post('text');
		$images = $_FILES['images']['name'];
		if (!empty($images)) {
			$config['upload_path'] = './assets/img/post';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('images')) {
				echo "Upload gambar gagal silahkan hubungi developer";
				die();
			} else {
				$images = $this->upload->data('file_name');
			}
			$data = [
				'judul' => $title,
				'idkategori' => $category,
				'isi_post' => $text,
				'file_gambar' => $images,
				'tgl_update' => time(),
				'idpenulis' => $id,
				'read' => 0,
			];
		} else {
			$images = '';
			$data = [
				'judul' => $title,
				'idkategori' => $category,
				'isi_post' => $text,
				'tgl_update' => time(),
				'idpenulis' => $id,
				'read' => 0,
			];
		}
		$this->db->where('idpost', $idpost);
		$this->db->update('post', $data);
	}

	public function getPostCategory()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->join('post', 'post.idkategori = kategori.id');
	}

	public function getComment($id)
	{
		$this->db->select('*');
		$this->db->from('komentar');
		$this->db->where('komentar.idpenulis', $id);
		return $this->db->get()->result_array();
	}

	public function deletecomment($id)
	{
		$this->db->where('komentar.idcomment', $id);
		$this->db->delete('komentar');
	}

	public function addtestimoni()
	{
		$iduser = $this->session->userdata('id');
		$testimoni = $this->input->post('testimoni');
		$testimoniedit = $this->input->post('testimoniedit');
		if ($testimoni) {
			$data = [
				'iduser' => $iduser,
				'testimoni' => $testimoni
			];

			$this->db->insert('testimoni', $data);
		} elseif ($testimoniedit) {
			$data = [
				'testimoni' => $testimoniedit
			];

			$this->db->where('iduser', $iduser);
			$this->db->update('testimoni', $data);
		}
	}

	public function getTesti($id)
	{
		return $this->db->get_where('testimoni', array('iduser' => $id))->row_array();
	}

	public function countReadByUser($id)
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->where('idpenulis', $id);
		$read = $this->db->get()->result_array();
		$total = 0;
		foreach ($read as $rd) {
			$total = $total + $rd['read'];
		}
		return $total;
	}
	public function countPostByUser($id)
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->where('idpenulis', $id);
		return $this->db->get()->num_rows();
	}

	public function countComment($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('komentar', 'users.id = komentar.idpenulis');
		$this->db->where('komentar.idpenulis', $id);
		return $this->db->get()->num_rows();
	}
}
