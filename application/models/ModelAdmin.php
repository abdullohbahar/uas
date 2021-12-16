<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('admin', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('admin', $where);
    }

    public function getAdminWhere($where = null)
    {
        return $this->db->get_where('admin', $where);
    }

    public function getAdmin()
    {
        return $this->db->get('admin');
    }

    public function adminWhere($where)
    {
        return $this->db->get_where('admin', $where);
    }

    public function simpanAdmin($data = null, $where = null)
    {
        $this->db->insert('admin', $data, $where);
    }

    public function updateAdmin($data = null, $where = null)
    {
        $this->db->update('admin', $data, $where);
    }

    public function hapusAdmin($where = null)
    {
        $this->db->delete('admin', $where);
    }

    // join
    public function joinAdmin($where)
    {
        $this->db->select('buku.id_kategori,kategori.kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }
}
