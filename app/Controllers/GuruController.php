<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\UsersModel;

class GuruController extends BaseController
{
    protected $guruModel;
    protected $userModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
        $this->userModel = new UsersModel();
        if (session('id_siswa')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'guru' => $this->guruModel->getGuru()
        ];

        return view('guru/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah data guru',
            'validation' => \Config\Services::validation()
        ];

        return view('guru/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama harus di isi.'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nip harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/guru/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama_guru'), '-', true);
        $this->guruModel->save([
            'nama_guru' => $this->request->getVar('nama_guru'),
            'slug' => $slug,
            'nip' => $this->request->getVar('nip'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        $id_guru = $this->guruModel->select('id_guru, nama_guru')->orderBy('id_guru', 'DESC')->limit(1)->get()->getResult();
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'password_hash' => MD5($this->request->getVar('password')),
            'email' => $this->request->getVar('email'),
            'id_guru' => $id_guru[0]->id_guru
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/guru');
    }

    public function delete($id_guru)
    {

        $this->guruModel->delete($id_guru);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/guru');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Guru',
            'validation' => \Config\Services::validation(),
            'guru' => $this->guruModel->getGuru($slug)
        ];

        return view('guru/edit', $data);
    }

    public function update($id_guru)
    {
        $guruLama = $this->guruModel->getGuru($this->request->getVar('slug'));
        if ($guruLama['nama_guru'] == $this->request->getVar('nama_guru')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        if (!$this->validate([
            'nama_guru' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama guru harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/guru/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getVar('nama_guru'), '-', true);
        $this->guruModel->save([
            'id_guru' => $id_guru,
            'nama_guru' => $this->request->getVar('nama_guru'),
            'slug' => $slug,
            'nip' => $this->request->getVar('nip'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/guru');
    }
}
