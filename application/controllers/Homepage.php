<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        $this->load->view('homepage/layout/header', $data);
        $this->load->view('homepage/layout/navbar', $data);
        $this->load->view('homepage/index', $data);
        $this->load->view('homepage/layout/footer');
    }
}
