<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PotensiModel;

use App\Models\KelurahanModel;
use CodeIgniter\HTTP\RedirectResponse;

class Potensi extends BaseController
{
    public function index()
    {
        //
        $potModel = new PotensiModel();

        $data = [
            'titel' => 'ini titel',
            'judul' => 'ini Judul',
            'potensi' => $potModel->get_pot()
        ];
        // dd($data);

        return view('potensi', $data);
    }

    public function add()
    {
        //    tampilkan Form Tambah Potensi
        $kelurahan = new KelurahanModel();

        $data = [
            'titel' => 'ini Titel',
            'judul' => 'ini judul',
            'kelurahan' => $kelurahan->findAll()

        ];
        return view('add_potensi', $data);
    }

    public function proses()
    {
        $potModel = new PotensiModel();
        // Validasi Inputan


        if ($this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'zona' => 'required',
            'kelas' => 'required',
            'status' => 'required'
        ])) {
            // Jika Valid
            $data = [
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'rt' => $this->request->getVar('rt'),
                'rw' => $this->request->getVar('rw'),
                'kelurahan_id' => $this->request->getVar('kelurahan'),
                'zona' => $this->request->getVar('zona'),
                'kelas' => $this->request->getVar('kelas'),
                'status' => $this->request->getVar('status'),
            ];

            $potModel->insert($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Simpan');
            return redirect()->to(base_url('potensi'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('potensi/add'));
            // Jika Tidak Valid
        }
    }

    public function pot_kel_add()
    {
        $session = session();
        $data = [
            'titel' => 'ini Titel',
            'judul' => 'ini judul',
            'kelurahan' => $session->get('kelurahan')

        ];
        return view('add_pot_kel', $data);
    }

    public function pot_kel_proses()
    {
        $potModel = new PotensiModel();
        $session = session();
        // Validasi Inputan


        if ($this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'zona' => 'required',
            'kelas' => 'required',
            'status' => 'required'
        ])) {
            // Jika Valid
            $data = [
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'rt' => $this->request->getVar('rt'),
                'rw' => $this->request->getVar('rw'),
                'kelurahan_id' => $session->get('kelurahan'),
                'zona' => $this->request->getVar('zona'),
                'kelas' => $this->request->getVar('kelas'),
                'status' => $this->request->getVar('status'),
            ];

            $potModel->insert($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Simpan');
            return redirect()->to(base_url('potensi/pot_by_kel'));
        } else {
            // Jika Tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('potensi/pot_kel_add'));
        }
    }

    public function pot_by_kel($id_kelurahan = null)
    {
        $session = session();
        $potModel = new PotensiModel();
        $id_kelurahan = $session->get('kelurahan');

        $data = [
            'titel' => 'ini Titel',
            'judul' => 'Database Potensi Kelurahan',
            'potensi' => $potModel->where('kelurahan_id', $id_kelurahan)->findAll(),

        ];
        // dd($data);
        return view('pot_kel', $data);
    }

    public function pot_ajukan($id_potensi = null)
    {
        // Mengajukan Potensi Ke SKRD
        $data = [
            'titel' => 'ini Titel',
            'judul' => 'Ajukan SKRD',

        ];
        return view('pot_ajukan', $data);
    }

    public function proses_ajukan($id_potensi = null)
    {
        # code...
    }
}