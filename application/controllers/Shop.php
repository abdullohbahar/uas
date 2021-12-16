<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Paket Makanan',
            'menu' => $this->ModelMenu->getMenu()->result_array()
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/shop', $data);
        $this->load->view('homepage/layout/footer');
    }

    public function prasmanan()
    {
        $data = [
            'title' => 'Paket Makanan',
            'menu' => $this->ModelMenu->menuWhere(['kategori_menu' => 'PRASMANAN'])->result_array()
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/shop', $data);
        $this->load->view('homepage/layout/footer');
    }

    public function box()
    {
        $data = [
            'title' => 'Paket Makanan',
            'menu' => $this->ModelMenu->menuWhere(['kategori_menu' => 'NASI BOX'])->result_array()
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/box', $data);
        $this->load->view('homepage/layout/footer');
    }

    public function tumpeng()
    {
        $data = [
            'title' => 'Paket Makanan',
            'menu' => $this->ModelMenu->menuWhere(['kategori_menu' => 'TUMPENG'])->result_array()
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/tumpeng', $data);
        $this->load->view('homepage/layout/footer');
    }

    public function detailPaket($id)
    {
        if ($this->session->userdata('username') == NULL) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Anda Harus Login Terlebih Dahulu</div>');
            redirect('masuk');
        } else {
            $data = [
                'title' => 'Paket Makanan',
                'menu' => $this->ModelMenu->menuWhere(['id_menu' => $id])->row_array(),
                // 'user' => $this->modelPelanggan->getPelangganWhere(['id_pelanggan' => $this->session->userdata('id_pelanggan')])
            ];

            $this->load->view('homepage/layout/header', $data);
            $this->load->view('homepage/layout/navbar', $data);
            $this->load->view('homepage/single-shop', $data);
            $this->load->view('homepage/layout/footer');
        }
    }

    public function pesan()
    {
        $kategori = $this->input->post('kategori_menu');
        $jml = $this->input->post('jml_pesanan');
        $harga = $this->input->post('harga');

        $total_harga = $jml * $harga;

        if ($kategori != "NASI BOX") {
            $data = [
                'nama_menu' => $this->input->post('nama', true),
                'harga' => $this->input->post('harga', true),
                'kategori_menu' => $this->input->post('kategori_menu', true),
                'nama_pelanggan' => $this->input->post('nama_pemesan', true),
                'jml_pesanan' => $this->input->post('jml_pesanan', true),
                'nohp' => $this->input->post('nohp', true),
                'nama_menu' => $this->input->post('nama_menu', true),
                'tgl_acara' => $this->input->post('tgl_acara', true),
                'alamat' => $this->input->post('alamat', true),
                'total_harga' => $this->input->post('harga', true),
                'status' => 'BELUM DIBAYAR',
                'tgl_pemesanan' => date('Y-m-d')
            ];
        } else {
            $data = [
                'nama_menu' => $this->input->post('nama', true),
                'harga' => $this->input->post('harga', true),
                'kategori_menu' => $this->input->post('kategori_menu', true),
                'nama_pelanggan' => $this->input->post('nama_pemesan', true),
                'jml_pesanan' => $this->input->post('jml_pesanan', true),
                'nohp' => $this->input->post('nohp', true),
                'nama_menu' => $this->input->post('nama_menu', true),
                'tgl_acara' => $this->input->post('tgl_acara', true),
                'alamat' => $this->input->post('alamat', true),
                'total_harga' => $total_harga,
                'status' => 'BELUM DIBAYAR',
                'tgl_pemesanan' => date('Y-m-d')
            ];
        }


        $this->ModelPesanan->simpanPesanan($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Menu Berhasil Dipesan</div>');
        redirect('pesanan');
    }
}
