<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AuthModel;

use App\Models\UserModel;

class Auth extends BaseController
{
    private $AutModel;
    private $userModel;
    private $session;
    public function __construct()
    {
        // Inisialisasi Model dan fungsi
        $this->AuthModel = new \App\Models\AuthModel();
        $this->userModel = new \App\Models\UserModel();
        $session = session();
    }
    public function index()
    {
        // Menampilkan Form 

        return view('Auth/login');
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // $password = password_verify($pass, PASSWORD_DEFAULT);
        // $cek_pass = password_verify($password, PASSWORD_DEFAULT);
        $cek_data = $this->userModel->where([
            'password' => $password,
            'email' => $email
        ])->first();
        // dd($cek_data);

        // validasi Inputan Login
        if ($this->validate([
            'email'    => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                ],
            ],
            'password' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'Masukkan Password.',
                ],
            ],
        ])) {
            //    Jika Valid
            $session = session();
            $model = new UserModel();
            $data = $model->where('email', $email)->first();
            if ($data) {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    if ($data['level'] == 1) {
                        # code...
                        $ses_data = [
                            'id'       => $data['id_user'],
                            'nama'     => $data['nama'],
                            'email'    => $data['email'],
                            'level'    => $data['level'],
                            'foto'    => $data['foto'],
                            'login'     => TRUE
                        ];
                        $session->set($ses_data);
                        return redirect()->to(base_url('admin'));
                    } elseif ($data['level'] == 2) {
                        $ses_data = [
                            'id'       => $data['id_user'],
                            'nama'     => $data['nama'],
                            'email'    => $data['email'],
                            'level'    => $data['level'],
                            'foto'    => $data['foto'],
                            'login'     => TRUE
                        ];
                        $session->set($ses_data);
                        return redirect()->to(base_url('pendata'));
                    } else {
                        $ses_data = [
                            'id'       => $data['id_user'],
                            'nama'     => $data['nama'],
                            'email'    => $data['email'],
                            'level'    => $data['level'],
                            'foto'    => $data['foto'],
                            'login'     => TRUE
                        ];
                        $session->set($ses_data);
                        return redirect()->to(base_url('Kolektor'));
                    }
                } else {
                    $session->setFlashdata('pesan', 'Password Salah');
                    return redirect()->to('Auth');
                }
            } else {
                $session->setFlashdata('pesan', 'Email tidak terdaftar');
                return redirect()->to('Auth');
            }
        } else {

            // jika Tidak Valid
            session()->setFlashdata('pesan', 'Masukkan Email dan Password yang Benar');
            return redirect()->to(base_url('Auth'));
        }
    }


    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('Auth'));
    }
}