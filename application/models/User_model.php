<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getSixCategory()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(6);
		return $this->db->get()->result_array();
	}

	public function getAllCategory()
	{
		return $this->db->get("kategori")->result_array();
	}

	public function getSixPost()
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('users', 'users.id = post.idpenulis');
		$this->db->order_by('tgl_update', 'DESC');
		$this->db->limit(6);
		return $this->db->get()->result_array();
	}

	public function getThreePost()
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('users', 'users.id = post.idpenulis');
		$this->db->order_by('tgl_update', 'DESC');
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function countUserRegistered()
	{
		return $this->db->get_where('users', array('users.role' => 'penulis'))->num_rows();
	}

	public function countCategory()
	{
		return $this->db->get('kategori')->num_rows();
	}

	public function countPost()
	{
		return $this->db->get('post')->num_rows();
	}

	public function getUserRegistered()
	{
		return $this->db->get_where('users', array('role' => 'penulis'))->result_array();
	}

	public function getSixPostById($id)
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('users', 'users.id = post.idpenulis');
		$this->db->order_by('tgl_update', 'DESC');
		$this->db->where('idkategori', $id);
		return $this->db->get()->result_array();
	}

	public function counAllPostById($id)
	{
		return $this->db->get_where('post', array('idpost' => $id))->num_rows();
	}

	public function getPostAllPostByCategory($id)
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('users', 'users.id = post.idpenulis');
		$this->db->order_by('tgl_update', 'DESC');
		$this->db->where('idkategori', $id);
		return $this->db->get()->result_array();
	}

	public function getPostById($id)
	{
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('users', 'users.id = post.idpenulis');
		$this->db->join('kategori', 'kategori.id = post.idkategori');
		$this->db->order_by('tgl_update', 'DESC');
		$this->db->where('idpost', $id);
		return $this->db->get()->row_array();
	}

	public function addComment($id)
	{
		$getidpenulis = $this->db->get_where('post', array('idpost' => $id))->row_array();
		$idpenulis = $getidpenulis['idpenulis'];
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$comment = $this->input->post('comment');

		$data = [
			'idpenulis' => $idpenulis,
			'idpost' => $id,
			'name' => $name,
			'email' => $email,
			'comment' => $comment,
			'tgl_update' => time()
		];

		$this->db->insert('komentar', $data);
	}

	public function getCommentById($id)
	{
		return $this->db->get_where('komentar', array('idpost' => $id))->result_array();
	}

	public function getAllPost($limit, $start, $keyword)
	{
		if ($keyword) {
			$this->db->like('judul', $keyword);
		}
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('users', 'users.id = post.idpenulis');
		return $this->db->get('', $limit, $start)->result_array();
	}

	public function addrating($id)
	{
		$ratingpenulis = $this->db->get_where('rating_penulis', array('iduser' => $id))->row_array();
		$rating = $ratingpenulis['rating'];
		$newrating = $this->input->post('rating');

		$data = [
			'rating' => $rating + $newrating
		];

		$this->db->where('iduser', $id);
		$this->db->update('rating_penulis', $data);
	}

	public function getRatingUser()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('rating_penulis', 'users.id = rating_penulis.iduser');
		$this->db->join('testimoni', 'users.id = testimoni.iduser');
		$this->db->where('users.role', 'penulis');
		$this->db->order_by('rating_penulis.rating', 'DESC');
		return $this->db->get()->result_array();
	}

	public function getAdmin()
	{
		return $this->db->get_where('users', array('role' => 'admin'))->result_array();
	}

	public function getAuthorById($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('testimoni', 'testimoni.iduser = users.id');
		$this->db->join('rating_penulis', 'rating_penulis.iduser = users.id');
		return $this->db->get_where('', array('users.id' => $id))->result_array();
	}

	public function getPostAuthor($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('post', 'users.id = post.idpenulis');
		$this->db->join('kategori', 'kategori.id = post.idkategori');
		$this->db->where('post.idpenulis', $id);
		$this->db->order_by('tgl_update', 'DESC');
		return $this->db->get()->result_array();
	}

	public function countPostByAuthor($id)
	{
		return $this->db->get_where('post', array('idpenulis' => $id))->num_rows();
	}

	public function updateviews($id)
	{
		$post = $this->db->get_where('post', array('idpost' => $id))->row_array();
		$views = $post['read'];

		$data = [
			'read' => $views + 1
		];

		$this->db->where('idpost', $id);
		$this->db->update('post', $data);
	}
}
