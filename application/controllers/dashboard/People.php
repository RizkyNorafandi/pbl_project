<?php
defined('BASEPATH') or exit('No direct script access allowed');

class People extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_petugas') == 0) {
            redirect('c_auth', 'refresh');
            $this->load->library('form_validation');
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

    // CRUD

    //ibu
    public function proses_tambah_ibu()
    {
        $this->M_people->proses_tambah_ibu();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>'
        );
        redirect('dashboard/people/tb_ibu');
    }

    public function hapus_i_data($nik_ibu)
    {
        $this->M_people->hapus_i_data($nik_ibu);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>'
        );
        redirect('dashboard/people/tb_ibu');
    }

    public function edit_ibu()
    {
        $this->M_people->edit_ibu();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Diubah! </div>'
        );
        redirect('dashboard/people/tb_ibu');
    }
    //end ibu

    // petugas
    public function proses_tambah_petugas()
    {
        $this->M_people->proses_tambah_petugas();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>'
        );
        redirect('dashboard/people/tb_kader');
    }

    public function edit_petugas()
    {
        $this->M_people->edit_petugas();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Diubah! </div>'
        );
        redirect('dashboard/people/tb_kader');
    }

    public function hapus_petugas($id_petugas)
    {
        $this->M_people->hapus_petugas($id_petugas);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>'
        );
        redirect('dashboard/people/tb_kader');
    }
    // end petugas

    //anak
    public function proses_tambah_anak()
    {
        $this->M_people->proses_tambah_anak();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>'
        );
        redirect('dashboard/people/tb_anak');
    }

    public function edit_anak()
    {
        $this->M_people->edit_anak();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Diubah! </div>'
        );
        redirect('dashboard/people/tb_anak');
    }

    public function hapus_anak($nik_anak)
    {
        $this->M_people->hapus_anak($nik_anak);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>'
        );
        redirect('dashboard/people/tb_anak');
    }
    //end anak

    // dokter
    public function tambah_dokter()
    {
        $this->M_people->tambah_dokter();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Ditambahkan! </div>'
        );
        redirect('dashboard/people/tb_dokter');
    }

    public function edit_dokter()
    {
        $this->M_people->edit_dokter();
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Diubah! </div>'
        );
        redirect('dashboard/people/tb_dokter');
    }

    public function hapus_dokter($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('dokter');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus! </div>'
        );
        redirect('dashboard/people/tb_dokter');
    }
}

/* End of file People.php */
