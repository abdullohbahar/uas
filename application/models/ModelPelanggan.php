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

    public function getPelanggan()
    {
        return $this->db->get('pelanggan');
    }

    public function pelangganWhere($where)
    {
        return $this->db->get_where('pelanggan', $where);
    }

    public function simpanPelanggan($data = null, $where = null)
    {
        $this->db->insert('pelanggan', $data, $where);
    }

    public function updatePelanggan($data = null, $where = null)
    {
        $this->db->update('pelanggan', $data, $where);
    }

    public function hapusPelanggan($where = null)
    {
        $this->db->delete('pelanggan', $where);
    }

    // join
    public function joinPelanggan($where)
    {
        $this->db->select('buku.id_kategori,kategori.kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }
}
