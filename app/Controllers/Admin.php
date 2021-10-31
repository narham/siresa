<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PotensiModel;

class Admin extends BaseController
{
    public function index()
    {
        // dashboard ADMIN
        $potmodel = new PotensiModel();
        $data = [
            'titel' => 'ini Titel',
            'judul' => 'ini Judul',
            'sum_pot' => $potmodel->sum_all_pot()
        ];

        return view('dashboard', $data);
    }
}