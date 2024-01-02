<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

    public function riwayat()
    {

        $result['riwayat'] = $this->db->get('riwayat_pertumbuhan')->result_array();

        $data['title'] = 'Riwayat Pasien';
        $this->load->view('template/dash_header.php', $data);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/riwayat', $result);
        $this->load->view('template/dash_footer.php');
    }

    public function vaksin()
    {
        $result['riwayat'] = $this->db->get('riwayat_vaksin')->result_array();

        $data['title'] = 'Riwayat Vaksin Pasien';
        $this->load->view('template/dash_header.php', $data);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/vaksin', $result);
        $this->load->view('template/dash_footer.php');
    }

    public function h_pemeriksaan()
    {
        $result['periksa'] = $this->db->get('hasil_pemeriksaan')->result_array();

        $data['title'] = 'Hasil Pemeriksaan Pasien';
        $this->load->view('template/dash_header.php', $data);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/hasil_pemeriksaan', $result);
        $this->load->view('template/dash_footer.php');
    }

    public function pemeriksaan()
    {
        $result['periksa'] = $this->db->get('pemeriksaan')->result_array();

        $data['title'] = 'Hasil Pemeriksaan Pasien';
        $this->load->view('template/dash_header.php', $data);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/pemeriksaan', $result);
        $this->load->view('template/dash_footer.php');
    }
}

/* End of file Riwayat.php */
