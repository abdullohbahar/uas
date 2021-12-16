<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelPelanggan extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('pelanggan', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('pelanggan', $where);
    }

    public function getPelangganWhere($where = null)
    {
        return $this->db->get_where('pelanggan', $where);
    }
}
