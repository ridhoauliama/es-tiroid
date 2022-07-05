<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Laporan_model', 'ML');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard Admin - Menu Riwayat Konsultasi';
		$data['tabel'] = 'Data Laporan Riwayat Konsultasi';

		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['laporan'] = $this->ML->getAllLaporan();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/laporan/index', $data);
		$this->load->view('templates/Admin_footer');
	}

	public function hapusLaporan()
	{
		$this->db->truncate('tbl_hasil_diagnosa');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Data Laporan</b>, berhasil dihapus.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>'
		);
		redirect('laporan');
	}

	public function cetakLaporan()
	{
		require('assets/fpdf/alphapdf.php');
		$this->load->model('Laporan_model');
		$laporan = $this->Laporan_model->getAllLaporan();

		$pdf = new AlphaPDF('L', 'mm', 'A4');
		$pdf->SetTitle('Laporan Hasil Konsultasi');

		$pdf->AddPage();
		$pdf->SetAlpha(1);
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(277, 2, 'Tanggal Cetak Laporan : ' . date('d-m-Y'), 0, 1, 'R');

		$pdf->Cell(277, 4, '', 0, 1, 'C');
		$pdf->SetFont('Times', 'BU', 12);
		$pdf->Cell(277, 10, 'Laporan Hasil Riwayat Konsultasi', 0, 1, 'C');
		$pdf->Cell(277, 4, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(10, 8, 'No', 1, 0, 'C');
		$pdf->Cell(55, 8, 'Nama Lengkap', 1, 0, 'C');
		$pdf->Cell(25, 8, 'Usia', 1, 0, 'C');
		$pdf->Cell(35, 8, 'Jenis Kelamin', 1, 0, 'C');
		$pdf->Cell(65, 8, 'Hasil Konsultasi', 1, 0, 'C');
		$pdf->Cell(45, 8, 'Nilai Kemungkinan (%)', 1, 0, 'C');
		$pdf->Cell(42, 8, 'Tanggal Konsultasi', 1, 1, 'C');

		$pdf->SetFont('Times', '', 10);
		$i = 1;
		foreach ($laporan as $l) :
			$pdf->Cell(10, 5, $i, 1, 0, 'C');
			$pdf->Cell(55, 5, $l['nama_user'], 1, 0, 'L');
			$pdf->Cell(25, 5, $l['usia'] . ' Tahun', 1, 0, 'C');
			$pdf->Cell(35, 5, $l['jk'], 1, 0, 'C');
			$pdf->Cell(65, 5, $l['nama_penyakit'] . ' (' . $l['kode_penyakit'] . ')', 1, 0, 'C');
			$pdf->Cell(45, 5, str_pad(substr(($l['hasil_probabilitas'] * 100), 0, 5), 2, '0') . ' %', 1, 0, 'C');
			$pdf->Cell(42, 5, $l['tanggal'], 1, 1, 'C');
			$i++;
		endforeach;

		$pdf->SetY(170);
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(277, 5, 'Sistem Pakar Mendiagnosa Penyakit Tiroid Pada Manusia Menggunakan Metode Theorema Bayes', 0, 1, 'C');
		$pdf->Cell(277, 5, 'Eka Yunifa (2018020161)', 0, 1, 'C');

		$pdf->Image('assets/img/logo-1.png', 143.5, 153, 15, 15);

		$pdf->Output('I', 'Laporan Hasil Konsultasi.pdf');
	}
}
