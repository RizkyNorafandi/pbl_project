<?php
defined('BASEPATH') or exit('No direct script access allowed');

class People extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_petugas') == 0) {
            redirect('c_auth', 'refresh');
        }
        $this->load->model('dashboard/M_people');
    }


    public function tb_ibu()
    {
        $title['title'] =  'Data Ibu';
        $data['data_ibu'] = $this->M_people->getUserIbu();
        $this->load->view('template/dash_header.php', $title);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/dash_ibu', $data, $title);
        $this->load->view('template/dash_footer.php');
    }

    public function tb_kader()
    {
        $title['title'] =  'Data kader';
        $data['data_petugas'] = $this->M_people->getUserKader();
        $this->load->view('template/dash_header.php', $title);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/dash_kader', $data, $title);
        $this->load->view('template/dash_footer.php');
    }

    public function tb_anak()
    {
        $title['title'] =  'Data Anak';
        $data['data_anak'] = $this->M_people->getUserAnak();
        $this->load->view('template/dash_header.php', $title);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/anak', $data, $title);
        $this->load->view('template/dash_footer.php');
    }

    public function tb_dokter()
    {
        $title['title'] =  'Data Dokter';
        $data['data_dokter'] = $this->M_people->getUserDokter();
        $this->load->view('template/dash_header.php', $title);
        $this->load->view('template/dash_sidebar.php');
        $this->load->view('template/dash_topbar.php');
        $this->load->view('dashboard/dokter', $data, $title);
        $this->load->view('template/dash_footer.php');
    }

    public function proses_tambah_ibu()
    {
        $this->M_people->proses_tambah_ibu();
        redirect('dashboard/people/tb_ibu');
    }

    public function hapus_i_data($nik_ibu)
    {
        $this->M_people->hapus_i_data($nik_ibu);
        redirect('dashboard/people/tb_ibu');
    }

    public function edit_ibu()
    {
        $this->M_people->edit_ibu();
        redirect('dashboard/people/tb_ibu');
    }

    // petugas
    public function proses_tambah_petugas()
    {
        $this->M_people->proses_tambah_petugas();
        redirect('dashboard/people/tb_kader');
    }

    public function edit_petugas()
    {
        $this->M_people->edit_petugas();
        redirect('dashboard/people/tb_kader');
    }

    public function hapus_petugas($id_petugas)
    {
        $this->M_people->hapus_petugas($id_petugas);
        redirect('dashboard/people/tb_kader');
    }

    //anak
    public function proses_tambah_anak()
    {
        $this->M_people->proses_tambah_anak();
        redirect('dashboard/people/tb_anak');
    }
}

/* End of file People.php */
