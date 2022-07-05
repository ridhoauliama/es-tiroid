<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('Laporan_model', 'ML');
    // $this->load->model('Gejala_model', 'GM');
    $this->load->model('Diagnosa_model', 'DM');
  }

  public function hasil()
  {
    if ($this->session->userdata('id_konsultasi') == $this->input->post('id_konsultasi', true)) {
      redirect(base_url('konsultasi'));
    } else {
      $this->DM->kosongTmpGejala();
      $data['gejala'] = '';
      $jGejala = $this->db->get('tbl_gejala')->num_rows();

      $res = str_split(substr($this->input->post('id_konsultasi', true), 3, 8), 2);
      $res[2] = $res[2] . $res[3];
      $data['tanggal'] = substr(implode('-', $res), 0, 10);

      echo $this->input->post('id_konsultasi', true) . '</br>';
      echo $data['tanggal'] . '</br>';
      echo $this->input->post('nama', true) . '</br>';
      echo $this->input->post('usia', true) . '</br>';
      echo $this->input->post('jk', true) . '</br>';
      for ($i = 1; $i <= $jGejala; $i++) {
        $data['gejala'] = $data['gejala'] . substr($this->input->post('gejala_' . $i, true), 1, 2);
      }
      echo $data['gejala'] . '</br>';
      $this->DM->insertTmpGejala($data['gejala']);

      $jPenyakit = $this->db->get('tbl_penyakit')->num_rows();
      $x = strlen($data['gejala']) / 2;

      echo '</br><b>Menjumlahkan nilai probabilitas dari tiap penyakit</b></br>';
      for ($k = 1; $k <= $jPenyakit; $k++) {
        ${'jP' . $k} = 0;
        $start = 0;
        for ($b = 1; $b <= $x; $b++) {
          $g = substr($data['gejala'], $start, 2);
          $row = $this->db->get_where('tbl_pengetahuan', ['id_penyakit' => $k, 'id_gejala' => $g])->row_array();
          ${'jP' . $k} = ${'jP' . $k} + $row['probabilitas'];
          $start += 2;
        }
        echo 'P0' . $k . ' = ' . ${'jP' . $k} . '</br>';
      }

      echo '</br><b>Mencari nilai probabilitas hipotesa H tanpa memandang evidence</b></br>';
      for ($k = 1; $k <= $jPenyakit; $k++) {
        $start = 0;
        for ($b = 1; $b <= $x; $b++) {
          $g = substr($data['gejala'], $start, 2);
          $row = $this->db->get_where('tbl_pengetahuan', ['id_penyakit' => $k, 'id_gejala' => $g])->row_array();
          if ($row['probabilitas'] != '' || $row['probabilitas'] != null) {
            ${'PH' . $k . $g} = $row['probabilitas'] / ${'jP' . $k};
            if (${'PH' . $k . $g} != null || ${'PH' . $k . $g} != 0) {
              echo 'P0' . $k . 'H' . $g . ' = ' . ${'PH' . $k . $g} . '</br>';
            }
          }
          $start += 2;
        }
      }

      echo '</br><b>Mencari nilai probabilitas hipotesis memandang evidence</b></br>';
      for ($k = 1; $k <= $jPenyakit; $k++) {
        ${'E0' . $k} = 0;
        $start = 0;
        for ($b = 1; $b <= $x; $b++) {
          $g = substr($data['gejala'], $start, 2);
          $row = $this->db->get_where('tbl_pengetahuan', ['id_penyakit' => $k, 'id_gejala' => $g])->row_array();
          if ($row['probabilitas'] != '' || $row['probabilitas'] != null) {
            ${'E0' . $k} = ${'E0' . $k} + ($row['probabilitas'] * ${'PH' . $k . $g});
          }
          $start += 2;
        }
        echo 'E0' . $k . ' = ' . ${'E0' . $k} . '</br>';
      }

      echo '</br><b>Mencari nilai hipotesa H benar jika diberi evidence</b></br>';
      for ($k = 1; $k <= $jPenyakit; $k++) {
        $start = 0;
        for ($b = 1; $b <= $x; $b++) {
          $g = substr($data['gejala'], $start, 2);
          $row = $this->db->get_where('tbl_pengetahuan', ['id_penyakit' => $k, 'id_gejala' => $g])->row_array();
          if ($row['probabilitas'] != '' || $row['probabilitas'] != null) {
            ${'PHE' . $k . $g} = ($row['probabilitas'] * ${'PH' . $k . $g}) / ${'E0' . $k};
            if (${'PHE' . $k . $g} != null || ${'PHE' . $k . $g} != 0) {
              echo 'PHE' . $k . $g . ' = ' . ${'PHE' . $k . $g} . '</br>';
            }
          }
          $start += 2;
        }
      }

      echo '</br><b>Mencari nilai kesimpulan</b></br>';
      $data['bayes'] = 0;
      $p = 0;
      for ($k = 1; $k <= $jPenyakit; $k++) {
        $start = 0;
        ${'bayes' . $k} = 0;
        for ($b = 1; $b <= $x; $b++) {
          $g = substr($data['gejala'], $start, 2);
          $row = $this->db->get_where('tbl_pengetahuan', ['id_penyakit' => $k, 'id_gejala' => $g])->row_array();
          // echo 'Bayes P0'.$k.' = '.${'bayes'.$k}.' + ('.$row['probabilitas'].' x '.${'PHE'.$k.$g}.')</br>';
          if ($row['probabilitas'] != '' || $row['probabilitas'] != null) {
            ${'bayes' . $k} = ${'bayes' . $k} + ($row['probabilitas'] * ${'PHE' . $k . $g});
          }
          $start += 2;
        }
        if (${'bayes' . $k} >= $data['bayes']) {
          $p = $k;
          $data['bayes'] = ${'bayes' . $k};
          $this->session->set_userdata('bayes' . $k, $data['bayes']);
        }
        echo 'Bayes P0' . $k . ' = ' . ${'bayes' . $k} . '</br>';
      }
      $str_bayes = (float)$data['bayes'] * 100;
      if ($str_bayes >= 100) {
        $persen_bayes = substr($str_bayes, 0, 3);
      } else {
        $persen_bayes = substr($str_bayes, 0, 2);
      }
      $data['p'] = 'P' . str_pad($p, 2, '0', STR_PAD_LEFT);
      echo '</br><b>Hasil Bayes : ' . $data['p'] . ' (' . $persen_bayes . '%)</b>';

      $this->DM->insertHasil($data);
      $this->session->set_userdata('id_konsultasi', $this->input->post('id_konsultasi', true));
      redirect(base_url('konsultasi/hasil'));
    }
  }
}
