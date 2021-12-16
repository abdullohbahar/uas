<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('masuk');
        }

        $data = [
            'title' => 'Paket Makanan',
            'total_harga' => $this->input->post('total_harga')
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/sukses', $data);
        $this->load->view('homepage/layout/footer');
    }

    public function pesananUser()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('masuk');
        }

        $data = [
            'title' => 'Paket Makanan',
            'pesanan' => $this->ModelPesanan->pesananWhere(['nama_pelanggan' => $this->session->userdata('nama_pelanggan')])->result_array()
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/pemesanan', $data);
        $this->load->view('homepage/layout/footer');
    }
}
