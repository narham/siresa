<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Kolektor extends BaseController
{
    public function index()
    {
        //
        $data = [
            'titel' => 'ini Titel',
            'judul' => 'Database Wajib Retribusi'
        ];
        return view('kolektor_home', $data);
    }

    public function data_kolektor()
    {
        $model = new UserModel();
        $data = [
            'titel' => 'Ini titel',
            'judul' => 'Database kolektor',
            'kolektor' => $model->get_kolektor()->where('level', 2)->get()->getResult()
        ];
        // dd($data);

        return view('kolektor', $data);
    }
}