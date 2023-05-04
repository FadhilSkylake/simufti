<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;

class Kegiatan extends BaseController
{
    protected $kegiatan;

    public function __construct()
    {
        $this->kegiatan = new KegiatanModel();
        if (session('id_siswa')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'kegiatan' => $this->kegiatan->getKegiatan()
        ];
        // dd($data['kegiatan']);
        return view('kegiatan/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'kegiatan' => $this->kegiatan->getKegiatan($slug)
        ];

        //jika data enggak ada
        if (empty($data['kegiatan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kegiatan'   . $slug .  ' tidak ditemukan.');
        }

        return view('kegiatan/detail', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('kegiatan/create', $data);
    }

    public function save()
    {


        //ambil gambar
        $fileDokumentasi = $this->request->getFile('dokumentasi');

        //jika gaada gambar yang di upload
        if ($fileDokumentasi->getError() == 4) {
            $namaDokumentasi = 'default.jpg';
        } else {

            //generate nama sampul random
            $namaDokumentasi = $fileDokumentasi->getRandomName();

            //pindahkan file gem img
            $fileDokumentasi->move('img', $namaDokumentasi);
        }



        $slug = url_title($this->request->getVar('nama_kegiatan'), '-', true);
        $this->kegiatan->save([
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tempat' => $this->request->getVar('tempat'),
            'waktu_kegiatan' => $this->request->getVar('waktu_kegiatan'),
            'waktu_dibuat' => $this->request->getVar('waktu_dibuat'),
            'dokumentasi' => $namaDokumentasi
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kegiatan');
    }

    public function delete($id_kegiatan)
    {
        //cari gambar berdasarkan id
        $kegiatan = $this->kegiatan->find($id_kegiatan);

        //jika gambar default
        if ($kegiatan['dokumentasi'] != 'default.svg') {

            //hapus gambar
            unlink('img/' . $kegiatan['dokumentasi']);
        }

        $this->kegiatan->delete($id_kegiatan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/kegiatan');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'kegiatan' => $this->kegiatan->getKegiatan($slug)
        ];
        return view('kegiatan/edit', $data);
    }

    public function update($id_kegiatan)
    {
        $kegiatanLama = $this->kegiatan->getKegiatan($this->request->getVar('slug'));
        if ($kegiatanLama['nama_kegiatan'] == $this->request->getVar('nama_kegiatan')) {
            $rule_kegiatan = 'required';
        } else {
            $rule_kegiatan = 'required';
        }

        if (!$this->validate([
            'nama_kegiatan' => [
                'rules' => $rule_kegiatan,
                'errors' => [
                    'required' => '{field} nama harus di isi.',
                ]
            ],
            'dokumentasi' => [
                'rules' => 'is_image[dokumentasi]|mime_in[dokumentasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'yang kamu pilih bukan gambar',
                    'mime_in' => 'yang kamu pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/kegiatan/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileDokumentasi = $this->request->getFile('dokumentasi');

        //cek gambar, apakah tetap gambar lama
        if ($fileDokumentasi->getError() == 4) {
            $namaDokumentasi = $this->request->getVar('dokumentasiLama');
        } else {
            //generate nama file random
            $namaDokumentasi = $fileDokumentasi->getRandomName();
            //pindahkan gambar
            $fileDokumentasi->move('img', $namaDokumentasi);
            //hapus file lama
            unlink('img/' . $this->request->getVar('dokumentasiLama'));
        }

        $slug = url_title($this->request->getVar('nama_kegiatan'), '-', true);
        $this->kegiatan->save([
            'id_kegiatan' => $id_kegiatan,
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'tempat' => $this->request->getVar('tempat'),
            'waktu_kegiatan' => $this->request->getVar('waktu_kegiatan'),
            'waktu_dibuat' => $this->request->getVar('waktu_dibuat'),
            'dokumentasi' => $namaDokumentasi
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

        return redirect()->to('/kegiatan');
    }
}
