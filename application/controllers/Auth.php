<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Harus Diisi!!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Login'
            ];
            $this->load->view('homepage/layout/header', $data);
            $this->load->view('homepage/layout/navbar', $data);
            $this->load->view('homepage/login', $data);
            $this->load->view('homepage/layout/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelPelanggan->cekData(['username' => $username])->row_array();

        // Jika user ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_pelanggan' => $user['id_pelanggan'],
                    'nama_pelanggan' => $user['nama_pelanggan'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'alamat' => $user['alamat'],
                    'nohp' => $user['nohp'],
                ];

                $this->session->set_userdata($data);

                redirect('');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>'
                );
                redirect('masuk');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-message" role="alert">Username tidak ditemukan!!</div>'
            );
            redirect('masuk');
        }
    }

    public function signup()
    {


        // Validation
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Lengkap', 'required', [
            'required' => 'Nama Lengkap Belum diisi!!'
        ]);

        $this->form_validation->set_rules('nohp', 'Nomor HP', 'required', ['required' => 'Nomor HP Belum diisi!!']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Belum diisi!!']);

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[pelanggan.email]', [
            'valid_email' => 'Email Tidak Benar!!', 'required' => 'Email Belum diisi!!', 'is_unique' => 'Email Sudah Terdaftar!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Belum diis!!']);

        // Registration
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Signup'
            ];
            $this->load->view('homepage/layout/header', $data);
            $this->load->view('homepage/layout/navbar', $data);
            $this->load->view('homepage/signup', $data);
            $this->load->view('homepage/layout/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama_pelanggan' => htmlspecialchars($this->input->post('nama_pelanggan', true)),
                'nohp' => htmlspecialchars($this->input->post('nohp', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat'), true)
            ];

            $this->ModelPelanggan->simpanData($data); //menggunakan model
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert"> Selamat!! akun anda sudah dibuat. Silahkan Login</div>');
            redirect('masuk');
        }
    }

    public function loginAdmin()
    {


        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Harus Diisi!!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Login Admin'
            ];
            $this->load->view('admin/login', $data);
        } else {
            $this->_loginAdmin();
        }
    }

    private function _loginAdmin()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelAdmin->cekData(['username' => $username])->row_array();

        // Jika user ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username']
                ];

                $this->session->set_userdata($data);

                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>'
                );
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-message" role="alert">Username tidak ditemukan!!</div>'
            );
            redirect('admin/login');
        }
    }

    public function logoutAdmin()
    {
        // $this->session->unset_userdata('username');

        $this->session->sess_destroy();

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah Logout!!</div>');
        redirect('admin/login');
    }

    public function logoutPelanggan()
    {
        // $this->session->unset_userdata('username');

        $this->session->sess_destroy();

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah Logout!!</div>');
        redirect('masuk');
    }
}
