<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_people extends CI_Model
{

    public function getUserIbu()
    {
        $result = $this->db->get('ibu')->result_array();
        return $result;
    }

    public function getUserKader()
    {
        $result = $this->db->get('petugas')->result_array();
        return $result;
    }

    public function getUserAnak()
    {
        $result = $this->db->get('anak')->result_array();
        return $result;
    }

    public function getUserDokter()
    {
        $result = $this->db->get('dokter')->result_array();
        return $result;
    }

    //funtion untuk mengihtung semua data dari tabels
    public function count_ibu()
    {
        $data = $this->db->count_all_results('ibu');
        return $data;
    }

    public function count_kader()
    {
        $data = $this->db->count_all_results('petugas');
        return $data;
    }

    public function count_anak()
    {
        $data = $this->db->count_all_results('anak');
        return $data;
    }


    public function detailIbu($id)
    {
        $this->db->where('id', $id);
    }

    public function get_Id_Ibu($nik_ibu)
    {
        return $this->db->get_where('ibu', ['nik_ibu' => $nik_ibu])
            ->row_array();
    }
    // Ibu
    public function proses_tambah_ibu()
    {
        $data = [
            "nik_ibu" => $this->input->post('nik'),
            "nama_ibu" => $this->input->post('nama'),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "alamat" => $this->input->post('alamat'),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'date_created' => time()
        ];

        $this->db->insert('ibu', $data);
    }

    public function hapus_i_data($nik_ibu)
    {
        $this->db->where('nik_ibu', $nik_ibu);
        $this->db->delete('ibu');
    }

    public function edit_ibu()
    {

        $this->db->trans_start();

        $id_ibu = $this->input->post('nik');

        $ibu = [
            'nik_ibu' => htmlspecialchars($this->input->post('nik')),
            'nama_ibu' => htmlspecialchars($this->input->post('nama')),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
        ];

        $this->db->where('nik_ibu', $id_ibu);
        $this->db->update('ibu', $ibu);

        $this->db->trans_complete();
    }

    // Petugas
    public function proses_tambah_petugas()
    {
        $data = [
            "nama_petugas" => htmlspecialchars($this->input->post('nama')),
            "alamat" => htmlspecialchars($this->input->post('alamat')),
            "no_telp" => htmlspecialchars($this->input->post('no_telp')),
            "jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin')),
            "username" => htmlspecialchars($this->input->post('username')),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
        ];

        $this->db->insert('petugas', $data);
    }

    public function edit_petugas()
    {

        $update = [
            "nama_petugas" => htmlspecialchars($this->input->post('nama')),
            "alamat" => htmlspecialchars($this->input->post('alamat')),
            "no_telp" => htmlspecialchars($this->input->post('no_telp')),
            "jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin')),
            "username" => htmlspecialchars($this->input->post('username')),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
        ];

        $this->db->where('id_petugas', $this->input->post('id'));
        $this->db->update('petugas', $update);
    }

    public function hapus_petugas($id_petugas)
    {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('petugas');
    }

    //anak
    public function proses_tambah_anak()
    {
        $data = [
            "nik_anak" => htmlspecialchars($this->input->post('nik')),
            "nama_anak" => htmlspecialchars($this->input->post('nama')),
            "tgl_lahir" => htmlspecialchars($this->input->post('tgl_lahir')),
            "tb_lahir" => htmlspecialchars($this->input->post('tb_lahir')),
            "bb_lahir" => htmlspecialchars($this->input->post('bb_lahir')),
            "jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin')),
            "lingkar_kepala" => htmlspecialchars($this->input->post('lingkar_kepala')),
        ];

        $this->db->insert('anak', $data);
    }

    public function edit_anak()
    {
        $nik = $this->input->post('nik');
        $update = [
            "nama_anak" => htmlspecialchars($this->input->post('nama')),
            "tgl_lahir" => htmlspecialchars($this->input->post('tgl_lahir')),
            "tb_lahir" => htmlspecialchars($this->input->post('tb_lahir')),
            "bb_lahir" => htmlspecialchars($this->input->post('bb_lahir')),
            "jenis_kelamin" => htmlspecialchars($this->input->post('jenis_kelamin')),
            "lingkar_kepala" => htmlspecialchars($this->input->post('lingkar_kepala')),
        ];
        $this->db->where('nik_anak', $nik);
        $this->db->update('anak', $update);
    }

    public function hapus_anak($nik_anak)
    {
        $this->db->where('nik_anak', $nik_anak);
        $this->db->delete('anak');
    }
}

/* End of file M_people.php */
