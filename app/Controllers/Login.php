<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    public function cekLogin()
    {
        $username = $this->request->getPost('login');
        $password = MD5($this->request->getPost('password'));
        $mLogin = new UsersModel();
        $user = $mLogin->where('username', $username)->first();
        if (empty($user)) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/');
        }
        if ($user['password_hash'] != $password) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('/');
        }

        session()->set('username', $user['username']);
        session()->set('id', $user['id']);
        if ($user['id_guru'] == NULL && $user['id_siswa'] == NULL) {
            session()->set('role', 'Tata Usaha');
            return redirect()->to('/dashboard_tu');
        } else if ($user['id_guru'] != null) {
            session()->set('id_guru', $user['id_guru']);
            return redirect()->to('/dashboard_guru');
        } else {
            session()->set('id_siswa', $user['id_siswa']);
            return redirect()->to('/dashboard_siswa');
        }
    }
    public function logout()
    {
        session()->remove('username');
        session()->remove('id');
        session()->remove('role');
        session()->remove('id_guru');
        session()->remove('id_siswa');
        return redirect()->to('/');
    }
}
