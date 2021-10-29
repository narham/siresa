<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pendata extends BaseController
{
    public function index()
    {
        //
        return view('pendata_home');
    }
}