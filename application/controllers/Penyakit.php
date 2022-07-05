<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Penyakit_model', 'penyakit');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = "Dashboard Admin - Menu Data Penyakit";
		$data['tabel'] = "List Data Penyakit";

		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['tbl_penyakit'] = $this->penyakit->getAllPenyakit();
		$data['kode'] = $this->penyakit->KodePenyakit();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/penyakit/index', $data);
		$this->load->view('templates/Admin_footer');
		$this->load->view('admin/penyakit/modal_tambah_penyakit', $data);
		$this->load->view('admin/penyakit/modal_ubah_penyakit');
	}

	public function tambah()
	{
		$this->penyakit->tambahPenyakit();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><b>Data Penyakit</b>, berhasil ditambahkan.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('penyakit');
	}

	public function ubah()
	{
		$this->penyakit->ubahPenyakit();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert"><b>Data Penyakit</b>, berhasil diubah.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('penyakit');
	}

	public function hapus($id)
	{
		$this->penyakit->hapusPenyakit($id);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Data Penyakit</b>, berhasil dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('penyakit');
	}
}
