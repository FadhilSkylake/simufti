<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MapelModel;

class MapelController extends BaseController
{
    protected $mapelModel;

    public function __construct()
    {
        $this->mapelModel = new MapelModel();
        if (session('id_siswa')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'mapel' => $this->mapelModel->findAll()
        ];

        return view('mapel/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('mapel/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/mapel/create')->withInput();
        }


        $this->mapelModel->save([
            'nama_mapel' => $this->request->getVar('nama_mapel'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/mapel');
    }

    public function delete($id_mapel)
    {

        $this->mapelModel->delete($id_mapel);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/mapel');
    }

    public function edit($id_mapel)
    {
        $data = [
            'title' => 'Form Edit Data mapel',
            'validation' => \Config\Services::validation(),
            'mapel' => $this->mapelModel->find($id_mapel),
            'id_mapel' => $id_mapel,
        ];
        return view('mapel/edit', $data);
    }

    public function update($id_mapel)
    {
        $mapelLama = $this->mapelModel->find($id_mapel);
        if ($mapelLama['nama_mapel'] == $this->request->getVar('nama_mapel')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        if (!$this->validate([
            'nama_mapel' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama mapel harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/mapel/edit/' . $id_mapel)->withInput();
        }


        $this->mapelModel->save([
            'id_mapel' => $id_mapel,
            'nama_mapel' => $this->request->getVar('nama_mapel'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/mapel');
    }
}
