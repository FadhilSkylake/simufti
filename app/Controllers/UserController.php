<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        if (session('id_siswa')) {
            return redirect()->back();
        }
        return view('user/index');
    }
}
