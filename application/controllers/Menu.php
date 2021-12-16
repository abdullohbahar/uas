<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules(
            'nama',
            'Nama Menu',
            'required|min_length[3]|is_unique[menu.nama_menu]',
            [
                'required' => 'Nama Menu harus diisi',
                'is_unique' => 'Nama Menu Sudah Dipakai'
            ]
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga Menu',
            'required',
            [
                'required' => 'Harga Menu harus diisi',
            ]
        );

        $this->form_validation->set_rules(
            'kategori_menu',
            'Kategori Menu',
            'required',
            [
                'required' => 'Kategori Menu harus diisi',
            ]
        );

        //konfigurasi sebelum gambar diupload 
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Data Menu',
                'menu' => $this->ModelMenu->getMenu()->result_array()
            ];

            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/navbar', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/menu', $data);
            $this->load->view('admin/layout/footer');
        } else {
            if ($this->upload->do_upload('gambar')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama_menu' => $this->input->post('nama', true),
                'harga_menu' => $this->input->post('harga', true),
                'kategori_menu' => $this->input->post('kategori_menu', true),
                'deskripsi_menu' => $this->input->post('deskripsi_menu', true),
                'gambar_menu' => $gambar
            ];

            $this->ModelMenu->simpanMenu($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Menu Berhasil Ditambahkan</div>');
            redirect('admin/data-menu');
        }
    }

    public function ubahMenu()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $this->form_validation->set_rules(
            'nama',
            'Nama Menu',
            'required|min_length[3]',
            [
                'required' => 'Nama Menu harus diisi',
            ]
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga Menu',
            'required',
            [
                'required' => 'Harga Menu harus diisi',
            ]
        );

        $this->form_validation->set_rules(
            'deskripsi_menu',
            'Deskripsi Menu',
            'required',
            [
                'required' => 'Deskripsi Menu harus diisi',
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Data Menu',
                'menu' => $this->ModelMenu->getMenu()->result_array()
            ];

            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/navbar', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/menu', $data);
            $this->load->view('admin/layout/footer');
        } else {
            $id = $this->input->post('id_menu');

            $upload_image = $_FILES['gambar_menu']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/upload/';
                $config['allowed_types'] = 'jpg|png|jpeg';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar_menu')) {
                    $image = $this->upload->data('file_name');
                    $data['gambar_menu'] = $image;
                    $this->ModelMenu->updateMenu($data, ['id_menu' => $this->input->post('id_menu')]);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_menu' => $this->input->post('nama', true),
                'harga_menu' => $this->input->post('harga', true),
                'kategori_menu' => $this->input->post('kategori_menu', true),
                'deskripsi_menu' => $this->input->post('deskripsi_menu', true)
            ];

            $this->ModelMenu->updateMenu($data, ['id_menu' => $this->input->post('id_menu')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Menu Baru Berhasil Ditambahkan </div>');
            redirect('admin/data-menu');
        }
    }

    public function hapusMenu($id)
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('admin/login');
        }

        $this->ModelMenu->hapusMenu(['id_menu' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Menu Berhasil Dihapus</div>');
        redirect('admin/data-menu');
    }
}
