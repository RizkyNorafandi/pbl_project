<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('dashboard/m_riwayat');
        $this->load->model('dashboard/M_hasil');
    }


    public function riwayat()
    {

        $result['riwayat'] = $this->m_riwayat->riwayat();
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
        $data['periksa'] = $this->m_riwayat->h_pemeriksaan();
        $data['h_periksa'] = $this->M_hasil->alldata();
        $title['title'] = 'Hasil Pemeriksaan Pasien';
        $this->load->view('template/dash_header.php', $title);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/hasil_pemeriksaan', $data);
        $this->load->view('template/dash_footer.php');
    }

    public function pemeriksaan()
    {

        $result['periksa'] = $this->m_riwayat->pemeriksaan();
        $title['title'] = 'Pemeriksaan Pasien';
        $this->load->view('template/dash_header.php', $title);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/pemeriksaan', $result);
        $this->load->view('template/dash_footer.php');
    }

    //hasil Pemeriksaan
    public function tambah_hasil()
    {
        $insert = [
            "id_periksa" => $this->input->post('id_periksa'),
            "keterangan" => $this->input->post('keterangan'),
            "resep" => $this->input->post('keterangan'),

        ];
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>'
        );

        $this->db->insert('hasil_pemeriksaan', $insert);
        redirect('dashboard/riwayat/h_pemeriksaan');
    }

    public function edit_hasil()
    {
        $id_periksa = $this->input->post('id_periksa');
        $update = [
            "keterangan" => $this->input->post('keterangan'),
            "resep" => $this->input->post('keterangan'),

        ];

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Diedit! </div>'
        );

        $this->db->where('id_periksa', $id_periksa);
        $this->db->update('hasil_pemeriksaan', $update);
        redirect('dashboard/riwayat/h_pemeriksaan');
    }

    public function hapus_hasil()
    {
        $id_periksa = $this->input->post('id_periksa');
        $this->db->where('id_periksa', $id_periksa);
        if ($this->db->delete('hasil_pemeriksaan') == false) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>'
            );
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>'
            );
        }
        redirect('dashboard/riwayat/h_pemeriksaan');
    }
}

/* End of file Riwayat.php */
