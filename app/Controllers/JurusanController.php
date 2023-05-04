<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JurusanModel;

class JurusanController extends BaseController
{
    protected $jurusanModel;

    public function __construct()
    {
        $this->jurusanModel = new JurusanModel();
        if (session('id_siswa')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'jurusan' => $this->jurusanModel->getJurusan()
        ];

        return view('jurusan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah data jurusan',
            'validation' => \Config\Services::validation()
        ];

        return view('jurusan/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama_jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama harus di isi.'
                ]
            ],

        ])) {
            return redirect()->to('/jurusan/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama_jurusan'), '-', true);
        $this->jurusanModel->save([
            'nama_jurusan' => $this->request->getVar('nama_jurusan'),
            'slug' => $slug,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/jurusan');
    }

    public function delete($id_jurusan)
    {

        $this->jurusanModel->delete($id_jurusan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/jurusan');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Jurusan',
            'validation' => \Config\Services::validation(),
            'jurusan' => $this->jurusanModel->getJurusan($slug)
        ];

        return view('jurusan/edit', $data);
    }

    public function update($id_jurusan)
    {
        // dd('masuk');
        $jurusanLama = $this->jurusanModel->getJurusan($this->request->getVar('slug'));
        if ($jurusanLama['nama_jurusan'] == $this->request->getVar('nama_jurusan')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        if (!$this->validate([
            'nama_jurusan' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama jurusan harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/jurusan/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getVar('nama_jurusan'), '-', true);
        $this->jurusanModel->update($id_jurusan, [
            'id_jurusan' => $id_jurusan,
            'nama_jurusan' => $this->request->getVar('nama_jurusan'),
            'slug' => $slug,
            'angkatan' => $this->request->getVar('angkatan')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/jurusan');
    }

    //make me a function join table?





}
