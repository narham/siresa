<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kolektor extends BaseController
{
    public function index()
    {
        //
        return view('kolektor_home');
    }
}