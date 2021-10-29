<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        // dashboard ADMIN

        return view('dashboard');
    }
}