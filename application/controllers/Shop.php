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

    public function detailPaket($id)
    {
        $data = [
            'title' => 'Paket Makanan',
            'menu' => $this->ModelMenu->menuWhere(['id_menu' => $id])->row_array()
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/single-shop', $data);
        $this->load->view('homepage/layout/footer');
    }
}
