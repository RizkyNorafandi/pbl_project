<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('sess');
        $this->load->library('form_validation');
    }


    public function index()
    {
        if ($this->session->userdata('nik')) {
            redirect("homepage");
        }

        $this->form_validation->set_rules(
            'user',
            'User',
            'trim|required',
            [
                'required' => 'NIK Harus Diisi!'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim',
        );


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('template/login_header', $data);
            $this->load->view('Auth/login');
            $this->load->view('template/login_footer');
        } else {
            //jika validasi berlajalan
            $this->_login();
        }
    }

    public function _login()
    {
        $username = $this->input->post('user');
        $password = $this->input->post('password');


        $cekIbu = $this->sess->cekUser('ibu', 'nik_ibu', $username);


        if ($cekIbu) {
            foreach ($cekIbu as $ibu) {
                if (password_verify($password, $ibu->password)) {
                    $dataIbu = array(
                        'nik_ibu' => $ibu->nik_ibu,
                        'nama' => $ibu->nama_ibu,
                    );
                    $this->session->set_userdata($dataIbu);
                    redirect('homepage');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                NIK atau Password salah</div>');
                    redirect('c_auth/index');
                }
            }
        }

        $cekPetugas = $this->sess->cekUser('petugas', 'username', $username);

        if ($cekPetugas) {
            foreach ($cekPetugas as $row) {
                if (password_verify($password, $row->password)) {
                    $dataPetugas = array(
                        'id_petugas' => $row->id_petugas,
                        'username' => $row->username,
                        'nama' => $row->nama_petugas,
                        'image' => $row->photo
                    );
                    $this->session->set_userdata($dataPetugas);
                    redirect('dashboard/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Username atau Password salah</div>');
                    redirect('c_auth/index');
                }
            }
        }
    }



    public function register()
    {
        $data['title'] = 'Registrasi';
        $this->load->view('template/login_header', $data);
        $this->load->view('Auth/register');
        $this->load->view('template/login_footer');
    }

    public function regis_ibu()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama Harus Diisi!'
        ]);

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|is_unique[ibu.nik_ibu]', [
            'required' => 'NIK Harus Diisi!',
            'numeric' => 'NIK Harus Berupa Angka!',
            'is_unique' => 'NIK Sudah Dipakai!'
        ]);

        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required', [
            'required' => 'Tanggal lahir Harus Diisi!'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat Harus Diisi!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Harus Diisi!'
        ]);



        if ($this->form_validation->run() == false) {

            # code...
            //register gagal dan kembali ke halaman register ibu
            $data['title'] = 'Registrasi Ibu';
            $this->load->view('template/login_header', $data);
            $this->load->view('Auth/register_ibu');
            $this->load->view('template/login_footer');
        } else {
            //jika register berhasil
            $this->sess->register_ibu();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                Akun Berhasil Ditambahkan! Silahkan Login
            </div>
            '
            );
            redirect('c_auth');
        }
    }

    // public function regis_anak()

    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
    //         'required' => 'Nama Harus Diisi!'
    //     ]);
    //     $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|is_unique[anak.nik_anak]', [
    //         'required' => 'NIK Harus Diisi!',
    //         'numeric' => 'NIK Harus Berupa Angka!',
    //         'is_unique' => 'NIK Sudah Dipakai!'
    //     ]);
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required', [
    //         'required' => 'Password Harus Diisi!'
    //     ]);
    //     $this->form_validation->set_rules('berat_badan', 'Berat badan', 'trim|required|numeric', [
    //         'required' => 'Berat Badan Harus Diisi!',
    //         'numeric' => 'Berat Badan Harus Berupa Angka!',
    //     ]);
    //     $this->form_validation->set_rules('tinggi_badan', 'Berat badan', 'trim|required|numeric', [
    //         'required' => 'Tinggi Badan Harus Diisi!',
    //         'numeric' => 'Tinggi Badan Harus Berupa Angka!',
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         # code...
    //         $data['title'] = 'Registrasi Anak';
    //         $this->load->view('template/login_header', $data);
    //         $this->load->view('Auth/register_anak');
    //         $this->load->view('template/login_footer');
    //     } else {
    //         $this->sess->register_anak();
    //         $this->session->set_flashdata(
    //             'message',
    //             '<div class="alert alert-success" role="alert">
    //             Akun Berhasil Ditambahkan! Silahkan Login
    //         </div>
    //         '
    //         );
    //         redirect('auth');
    //     }
    // }
}

/* End of file Controllername.php */
