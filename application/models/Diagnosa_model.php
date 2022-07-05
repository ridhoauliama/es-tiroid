<?php
class Diagnosa_model extends CI_model
{
  public function kosongTmpGejala()
  {
    $this->db->truncate('tmp_gejala');
  }

  public function insertTmpGejala($gejala)
  {
    $this->db->set('id_user', $this->input->post('id_konsultasi', true));
    $this->db->set('id_gejala', $gejala);
    $this->db->insert('tmp_gejala');
  }

  public function insertHasil($data)
  {
    $tanggal = $data['tanggal'];
    $bayes = $data['bayes'];
    $g = $data['gejala'];
    $p = $data['p'];
    $data = [
      'id_hasil' => $this->input->post('id_konsultasi', true),
      'hasil_probabilitas' => $bayes,
      'kode_penyakit' => $p,
      'kode_gejala' => $g,
      'nama_user' => $this->input->post('nama', true),
      'usia' => $this->input->post('usia', true),
      'jk' => $this->input->post('jk', true),
      'tanggal' => $tanggal,
      'waktu' => time()
    ];
    return $this->db->insert('tbl_hasil_diagnosa', $data);
  }
}
