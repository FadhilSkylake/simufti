<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\DetailModel;
use App\Models\JurusanModel;
use App\Models\GuruModel;
use App\Models\SiswaModel;

class KelasController extends BaseController
{
    protected $kelasModel;
    protected $jurusan;
    protected $guru;
    protected $detail;
    protected $siswa;

    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->jurusan = new JurusanModel();
        $this->guru = new GuruModel();
        $this->detail = new DetailModel();
        $this->siswa = new SiswaModel();
        if (session('id_siswa')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'kelas' => $this->kelasModel->getKelas()
        ];
        return view('kelas/index', $data);
    }

    public function detail($id_kelas)
    {
        $data = [
            'detail' => $this->detail->getDetail($id_kelas),
            'id_kelas' => $id_kelas
        ];
        return view('kelas/detail', $data);
    }

    public function create_detail($id_kelas)
    {
        $data = [
            'siswa' => $this->siswa->findAll(),
            'id_kelas' => $id_kelas,
            'detail' => $this->detail->getDetail($id_kelas)
        ];

        return view('kelas/create_detail', $data);
    }

    public function save_detail($id_kelas)
    {
        // validasi input
        if (!$this->validate([
            'nama_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/kelas/create_detail/' . $id_kelas)->withInput();
        }


        $this->detail->save([
            'kelas_id' => $id_kelas,
            'siswa_id' => $this->request->getVar('nama_siswa'),

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kelas/' . $id_kelas);
    }

    public function delete_detail($id_detail)
    {
        // dd($id_kelas);
        $this->detail->delete(['id_detail' => $id_detail]);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/kelas/' . $id_detail);
    }

    public function edit_detail($id_detail)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'detail' => $this->detail->find($id_detail),
            'siswa' => $this->siswa->find(),
            'id_detail' => $id_detail
        ];
        // dd($data);
        return view('kelas/edit_detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah data Kelas',
            'validation' => \Config\Services::validation(),
            'kelas' => $this->kelasModel->getKelas(),
            'jurusan' => $this->jurusan->findAll(),
            'guru' => $this->guru->findAll()
        ];

        return view('kelas/create', $data);
    }


    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} nama harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/kelas/create')->withInput();
        }


        $slug = url_title($this->request->getVar('nama_kelas'), '-', true);
        $this->kelasModel->save([
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'slug' => $slug,
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'angkatan' => $this->request->getVar('angkatan'),
            'id_guru' => $this->request->getVar('id_guru')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kelas');
    }

    public function delete($id_kelas)
    {
        // dd($id_kelas);
        $this->kelasModel->delete(['id_kelas' => $id_kelas]);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/kelas');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'kelas' => $this->kelasModel->getKelas($slug),
            'jurusan' => $this->jurusan->findAll(),
            'guru' => $this->guru->findAll()
        ];
        // dd($data['kelas']);
        return view('kelas/edit', $data);
    }

    public function update($id_kelas)
    {
        $kelasLama = $this->kelasModel->getKelas($this->request->getVar('slug'));
        if ($kelasLama->nama_kelas == $this->request->getVar('nama_kelas')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required';
        }

        if (!$this->validate([
            'nama_kelas' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} nama guru harus di isi.'
                ]
            ]
        ])) {
            return redirect()->to('/kelas/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $slug = url_title($this->request->getVar('nama_kelas'), '-', true);
        $this->kelasModel->save([
            'id_kelas' => $id_kelas,
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'slug' => $slug,
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'angkatan' => $this->request->getVar('angkatan'),
            'id_guru' => $this->request->getVar('id_guru')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/kelas');
    }
}
