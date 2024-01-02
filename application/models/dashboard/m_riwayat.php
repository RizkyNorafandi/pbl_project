<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_riwayat extends CI_Model
{

    public function getRiwayat()
    {
        $result = $this->db->get('anak')->result_array();
        return $result;
    }
}

/* End of file m_riwayat.php */
