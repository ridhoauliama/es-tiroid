<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Konsultasi - Form Konsultasi';
		$this->load->model('Gejala_model');
		$data['gejala'] = $this->Gejala_model->getAllGejala();
		$this->load->view('konsultasi/index', $data);
	}

	public function hasil()
	{
		$data['id_konsultasi'] = $this->session->userdata('id_konsultasi');
		$this->load->model('Laporan_model');
		$this->load->model('Gejala_model');
		$data['hasil'] = $this->Laporan_model->getLaporanById($data);
		$data['judul'] = 'Konsultasi - Form Hasil Konsultasi';
		$this->load->view('konsultasi/hasil', $data);
	}

	public function printHasil()
	{
		$data['id_konsultasi'] = $this->input->get('id', true);
		$this->load->model('Laporan_model');
		$this->load->model('Gejala_model');
		$hasil = $this->Laporan_model->getLaporanById($data);

		require('assets/fpdf/alphapdf.php');
		$pdf = new AlphaPDF('L', 'mm', 'A4');
		$pdf->SetTitle('Laporan Hasil Konsultasi');

		$pdf->AddPage();
		$pdf->SetAlpha(1);

		$pdf->Cell(277, 0, '', 1, 1, 'C');
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(277, 15, 'Sistem Pakar Mendiagnosa Penyakit Tiroid Pada Manusia Menggunakan Metode Teorema Bayes', 1, 1, 'C');
		$pdf->Image('assets/img/logo-1.png', 10, 10, 15, 15);
		$pdf->Image('assets/img/logo-1.png', 267, 10, 15, 15);
		$pdf->Cell(277, 0, '', 1, 1, 'C');

		$pdf->Cell(277, 0, '', 0, 1, 'C');
		$pdf->SetFont('Times', 'BU', 12);
		$pdf->Cell(277, 8, 'Laporan Hasil Konsultasi', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Tanggal Konsultasi : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(20, 5, $hasil['tanggal'], 0, 1, 'L');

		$pdf->Cell(277, 3, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Nama Lengkap : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(20, 5, $hasil['nama_user'], 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Usia : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(20, 5, $hasil['usia'] . ' Tahun', 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Jenis Kelamin : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(20, 5, $hasil['jk'], 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Gejala yang dipilih : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$inc = strlen($hasil['kode_gejala']) / 2;
		$gejala = $this->Gejala_model->getAllGejala();
		$start = 0;
		for ($i = 1; $i <= $inc; $i++) {
			$g = 'G' . substr($hasil['kode_gejala'], $start, 2);
			$gejala = $this->db->get_where('tbl_gejala', ['kode_gejala' => $g])->row_array();
			$pdf->Cell(277, 5, $gejala['kode_gejala'] . ' - ' . $gejala['nama_gejala'], 0, 1, 'L');
			$start += 2;
		}

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(20, 5, 'Hasil Konsultasi : ', 0, 1, 'L');

		$pdf->SetFont('Times', '', 10);
		// $pdf->Cell(20, 5, 'Kategori Gangguan : ' . $hasil['nama_penyakit'] . ' (' . $hasil['kode_penyakit'] . ')', 0, 1, 'L');
		// $pdf->SetFont('Times', '', 10);
		$pdf->Cell(20, 5, 'Berdasarkan hasil dari proses metode Teorema Bayes dalam mendiagnosa penyakit tiroid pada manusia, Anda didiagnosa menderita penyakit : ', 0, 1, 'L');
		$pdf->SetFont('Times', 'BU', 10);
		$pdf->Cell(29, 5, $hasil['nama_penyakit'] . ' (' . $hasil['kode_penyakit'] . '),', 0, 0, 'L');
		// $pdf->SetFont('Times', '', 10);
		$pdf->Cell(0, 5, 'dengan persentase keyakinan sebesar ' . str_pad(substr(($hasil['hasil_probabilitas'] * 100), 0, 5), 2, '0') . ' %.', 0, 1, 'L');
		// $pdf->SetFont('Times', 'U', 10);
		// $pdf->Cell(20, 5, str_pad(substr(($hasil['hasil_probabilitas'] * 100), 0, 5), 2, '0') . ' %', 0, 1, 'L');

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(0, 5, 'Solusi : ', 0, 1, 'L');
		$pdf->SetFont('Times', '', 10);
		$pdf->MultiCell(277, 5, $hasil['solusi'], 0, 1, 0);

		$pdf->SetFont('Times', 'B', 10);
		$pdf->SetY(150);
		$pdf->Cell(277, 20, 'Terimakasih telah menggunakan web aplikasi kami, semoga hasil konsultasi ini bisa membantu Anda', 0, 1, 'C');
		$pdf->Cell(277, -10, '~!! Peluk Hangat !!~', 0, 1, 'C');

		$pdf->Output('I', 'Laporan Hasil Konsultasi ' . $hasil['nama_user'] . '.pdf');
	}
}
