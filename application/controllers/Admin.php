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
            'title' => 'Dashboard Admin',
        ];

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/navbar', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }

    public function dataAdmin()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[3]',
            [
                'required' => 'Username harus diisi',
            ]
        );

        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Lengkap harus diisi',
            ]
        );

        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Data Admin',
                'admin' => $this->ModelAdmin->adminWhere(['roles' => 'admin'])->result_array()
            ];

            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/navbar', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/admin', $data);
            $this->load->view('admin/layout/footer');
        } else {

            $data = [
                'username' => $this->input->post('username', true),
                'nama_lengkap' => $this->input->post('nama_lengkap', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'roles' => 'admin'
            ];

            $this->ModelAdmin->simpanAdmin($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Admin Berhasil Ditambahkan</div>');
            redirect('admin/data-admin');
        }
    }



    public function ubahAdmin()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[3]',
            [
                'required' => 'Username harus diisi',
            ]
        );

        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required',
            [
                'required' => 'Nama Lengkap harus diisi',
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Data Admin',
                'admin' => $this->ModelAdmin->adminWhere(['roles' => 'admin'])->result_array()
            ];

            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/navbar', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/admin', $data);
            $this->load->view('admin/layout/footer');
        } else {
            $id = $this->input->post('id_menu');

            if ($this->input->post('password') != NULL) {
                $data = [
                    'username' => $this->input->post('username', true),
                    'nama_lengkap' => $this->input->post('nama_lengkap', true),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                ];
            } else {
                $data = [
                    'username' => $this->input->post('username', true),
                    'nama_lengkap' => $this->input->post('nama_lengkap', true),
                ];
            }

            $this->ModelAdmin->updateAdmin($data, ['id_admin' => $this->input->post('id_admin')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Admin Berhasil Diubah </div>');
            redirect('admin/data-admin');
        }
    }

    public function hapusAdmin($id)
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $this->ModelAdmin->hapusAdmin(['id_admin' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Admin Berhasil Dihapus</div>');
        redirect('admin/data-admin');
    }
}
