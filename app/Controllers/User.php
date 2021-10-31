<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

use App\Models\KelurahanModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->KelurahanModel = new KelurahanModel();
    }
    public function index()
    {
        //
        $data = [
            'titel' => 'Ini Titel',
            'judul' => 'Database User',
            'user' => $this->UserModel->get_all()
        ];
        return view('user', $data);
    }

    public function add()
    {
        // tampilkan Firm Tambah User
        $data = [
            'titel' => 'ini titel',
            'judul' => 'Tambah user',
            'kelurahan' => $this->KelurahanModel->findAll()
        ];

        return view('add_user', $data);
    }

    public function proses()
    {
        // Proses Simpan
        if ($this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh Kosong',
                ],
            ],
            'email'    => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'valid_email' => 'Masukkan {field} yang benar',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ],
            ],
            'kelurahan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelurahan Tidak Boleh kosong',
                ],
            ],

        ])) {
            // Jika inputan Valid
            $pass = $this->request->getVar('password');
            $data = [
                'nama' => $this->request->getvar('nama'),
                'email' => $this->request->getvar('email'),
                'password' => password_hash($pass, PASSWORD_DEFAULT),
                'hp' => $this->request->getvar('hp'),
                'foto' => $this->request->getvar('foto'),
                'status' => $this->request->getvar('status'),
                'kelurahan_id' => $this->request->getvar('kelurahan'),
                'level' => $this->request->getvar('level'),

            ];
            $this->UserModel->insert($data);
            session()->setFlashdata('pesan', 'Data Berhasil berhasil di tambahkan');
            return redirect()->to(base_url('user'));
        } else {
            // Jika inputan tidak  Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
        }
    }
    public function profile($id_user = null)
    {
        $model = new UserModel();
        $data = [
            'titel' => 'Ini titel',
            'judul' => 'Profile',

            'user' => $model->get_profle($id_user)
        ];
        // dd($data);
        return view('profile', $data);
    }

    public function setting($id_user = null)
    {
        $session = session();
        $id_user = $this->request->getVar('id_user');
        $pass = $this->request->getVar('password');
        $userModel = new UserModel();
        $user = $userModel->find($id_user);
        $foto = $this->request->getFile('foto');
        // dd($foto);
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotolama = $user['foto'];
            if (file_exists('foto/' . $fotolama)) {
                unlink('foto/' . $fotolama);
            }
            $newName = $foto->getRandomName();
            $foto->move(ROOTPATH . 'foto', $newName);
        }
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'foto' => $newName
        ];
        $userModel->update($id_user, $data);
        $data_session = $userModel->find($id_user);
        $ses_data = [
            'id'       => $data_session['id_user'],
            'nama'     => $data_session['nama'],
            'email'    => $data_session['email'],
            'level'    => $data_session['level'],
            'foto'    => $data_session['foto'],
            'login'     => TRUE
        ];
        // $session->regenerate();
        // $session->push($ses_data);
        $session->stop();
        $session->set($ses_data);
        $session->start($ses_data);
        return redirect()->back();
    }
}