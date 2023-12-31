<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sess extends CI_Model
{

    public function register_ibu()
    {
        $this->db->trans_start();

        $ibu = [
            'nik_ibu' => htmlspecialchars($this->input->post('nik')),
            'nama_ibu' => htmlspecialchars($this->input->post('nama')),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'date_created' => time()

        ];
        $this->db->insert('ibu', $ibu);

        // $last_id = $this->db->insert_id();

        // $daftar = [
        //     'no_daftar' => $last_id,
        //     'nik_ibu' => htmlspecialchars($this->input->post('nik')),
        // ];

        // $this->db->insert('pendaftaran', $daftar);

        $this->db->trans_complete();
    }


    public function cekUser($tabel, $field, $param)
    {
        $this->db->from($tabel);
        $this->db->where($field, $param);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

/* End of file sess.php */
