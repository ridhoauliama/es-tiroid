<?php
class Laporan_model extends CI_model
{

  public function getAllLaporan()
  {
    $this->db->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit=tbl_hasil_diagnosa.kode_penyakit', 'inner');
    return $this->db->get('tbl_hasil_diagnosa')->result_array();
  }

  public function getLaporanById($data)
  {
    $id = $data['id_konsultasi'];
    $this->db->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit=tbl_hasil_diagnosa.kode_penyakit', 'inner');
    return $this->db->get_where('tbl_hasil_diagnosa', ['id_hasil' => $id])->row_array();
  }
}
