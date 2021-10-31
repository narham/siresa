<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PotensiModel;

use App\Models\UserModel;

class Pendata extends BaseController
{
    public function index($id_kelurahan = null)
    {
        //
        $session = session();
        $potModel = new PotensiModel();
        $id_kelurahan = $session->get('kelurahan');

        $data = [
            'titel' => 'ini Titel',
            'judul' => 'Database Potensi',
            'potensi' => $potModel->where('kelurahan_id', $id_kelurahan)->findAll(),
            'sumpot' => $potModel->sum_pot($id_kelurahan),
            'aktif' => $potModel->sum_aktif($id_kelurahan),
            'off' => $potModel->sum_off($id_kelurahan),
        ];
        // dd($data);
        return view('pendata_home', $data);
    }

    public function data_pendata()
    {
        # code...

        $model = new UserModel();
        $data = [
            'titel' => 'Ini Titel',
            'judul' => 'Database Pendata',
            'pendata' => $model->get_pendata()->where('level', 3)->get()->getResult()
        ];
        // dd($data);

        return view('pendata', $data);
    }
}