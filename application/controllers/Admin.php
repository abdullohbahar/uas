<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $data = [
            'title' => 'Dashboard Admin'
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/navbar', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }
}
