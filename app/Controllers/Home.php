<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'titel' => 'ini titel',
            'judul' => 'ini judul'
        ];
        return view('layout/blank', $data);
    }
}