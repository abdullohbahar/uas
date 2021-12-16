<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $data = [
            'title' => 'Data Pesanan',
            'pesanan' => $this->ModelPesanan->getPesanan()->result_array()
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/navbar', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/pesanan', $data);
        $this->load->view('admin/layout/footer');
    }

    public function updateStatus()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $id = $this->input->post('id_pesanan');
        $status = $this->input->post('status');

        $data = [
            'status' => $status
        ];

        $this->ModelPesanan->updatePesanan($data, ['id_pesanan' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Status Berhasil Diubah </div>');
        redirect('admin/data-pesanan');
    }
}
