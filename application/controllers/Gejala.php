<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Gejala_model', 'MG');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['judul'] = 'Dashboard Admin - Menu Data Gejala';
		$data['tabel'] = 'List Data Gejala';

		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['gejala'] = $this->MG->getAllGejala();
		$data['kode'] = $this->MG->KodeGejala();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/gejala/index', $data);
		$this->load->view('templates/Admin_footer');
		$this->load->view('admin/gejala/modal_ubah');
		$this->load->view('admin/gejala/modal_tambah', $data);
	}
	public function tambah()
	{
		$this->MG->tambahGejala();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><b>Data Gejala</b>, berhasil ditambahkan.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('gejala');
	}
	public function ubah()
	{
		$this->MG->ubahGejala();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><b>Data Gejala</b>, berhasil diubah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('gejala');
	}
	public function hapus($id)
	{
		$this->MG->hapusGejala($id);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Data Gejala</b>, berhasil dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('gejala');
	}
}
