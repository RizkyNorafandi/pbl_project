<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_riwayat extends CI_Model
{

    public function h_pemeriksaan()
    {
        $this->db->select('*');
        $this->db->from('hasil_pemeriksaan a');
        $this->db->join('pemeriksaan b', 'b.id_periksa = a.id_periksa', 'left');
        $this->db->join('dokter c', 'c.nip = b.nip_dokter', 'left');
        return $this->db->get()->result_array();
    }

    public function pemeriksaan()
    {
        $this->db->select('*');
        $this->db->from('pemeriksaan a');
        $this->db->join('dokter b', 'b.nip = a.nip_dokter', 'left');
        $this->db->join('ruangan c', 'c.no_ruangan = a.no_ruangan', 'left');

        return $this->db->get()->result_array();
    }

    public function riwayat()
    {
        $this->db->select('*');
        $this->db->from('riwayat_pertumbuhan a');
        $this->db->join('anak b', 'b.nik_anak = a.nik_anak', 'left');
        return $this->db->get()->result_array();
    }
}

/* End of file m_riwayat.php */
