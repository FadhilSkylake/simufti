<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\KegiatanModel;
use App\Models\JurusanModel;

class HomeTu extends BaseController
{
    protected $kegiatan;
    protected $guru;
    protected $jurusan;
    protected $siswa;
    protected $kelas;

    public function __construct()
    {
        $this->kegiatan = new KegiatanModel();
        $this->guru = new GuruModel();
        $this->jurusan = new JurusanModel();
        $this->siswa = new SiswaModel();
        $this->kelas = new KelasModel();
        if (session('id_siswa') && session('Tata Usaha')) {
            return redirect()->back();
        }
    }

    public function index()
    {

        $data = [
            'kegiatan' => $this->kegiatan->getKegiatan(),
            'guru' => $this->guru->countAll(),
            'jurusan' => $this->jurusan->countAll(),
            'siswa' => $this->siswa->countAll(),
            'kelas' => $this->kelas->countAll()
        ];
        return view('dashboard/index', $data);
    }
}
