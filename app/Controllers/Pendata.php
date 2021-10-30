<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Pendata extends BaseController
{
    public function index()
    {
        //
        $data = [
            'titel' => 'ini Titel',
            'judul' => 'Dashboard Pendata'
        ];
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