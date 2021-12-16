<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'prasmanan' => $this->ModelMenu->menuWhere(['kategori_menu' => 'PRASMANAN'])->result_array(),
            'box' => $this->ModelMenu->menuWhere(['kategori_menu' => 'NASI BOX'])->result_array(),
            'tumpeng' => $this->ModelMenu->menuWhere(['kategori_menu' => 'TUMPENG'])->result_array(),
            'menu' => $this->ModelMenu->getMenu()->result_array()
        ];

        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/index', $data);
        $this->load->view('homepage/layout/footer');
    }
}
