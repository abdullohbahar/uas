<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelPesanan extends CI_Model
{
    // manajemen buku

    public function getPesanan()
    {
        return $this->db->get('pesanan');
    }

    public function pesananWhere($where)
    {
        return $this->db->get_where('pesanan', $where);
    }

    public function simpanPesanan($data = null, $where = null)
    {
        $this->db->insert('pesanan', $data, $where);
    }

    public function updatePesanan($data = null, $where = null)
    {
        $this->db->update('pesanan', $data, $where);
    }

    public function hapusPesanan($where = null)
    {
        $this->db->delete('pesanan', $where);
    }

    // join
    public function joinPesanan($where)
    {
        $this->db->select('buku.id_kategori,kategori.kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }
}
