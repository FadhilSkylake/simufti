<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MapelModel;
use \App\Models\NilaiModel;
use \App\Models\SiswaModel;

use App\Libraries\Pdfgenerator;

class NilaiController extends BaseController
{
    protected $nilai;
    protected $siswa;
    protected $mapel;

    public function __construct()
    {
        $this->nilai = new NilaiModel();
        $this->siswa = new SiswaModel();
        $this->mapel = new MapelModel();
        if (session('id_siswa')) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = [
            'siswa' => $this->siswa->getNilaiSiswa(),
        ];
        return view('nilai/index', $data);
    }

    public function create()
    {
        $data = [
            'siswa' => $this->siswa->findAll(),
            'mapel' => $this->mapel->findAll(),
        ];
        return view('nilai/create', $data);
    }

    public function save()
    {
        $mapel = $this->mapel->findAll();
        $no = 1;
        $no1 = 1;
        $no2 = 1;
        $no3 = 1;
        $no4 = 1;
        foreach ($mapel as $m) {
            $data = [
                'siswa_id' => $this->request->getPost('siswa_id'),
                'mapel_id' => $this->request->getPost('mapel_id' . $no++),
                'absensi' => $this->request->getPost('absensi' . $no1++),
                'tugas' => $this->request->getPost('tugas' . $no2++),
                'uts' => $this->request->getPost('uts' . $no3++),
                'uas' => $this->request->getPost('uas' . $no4++),
            ];
            $this->nilai->save($data);
        }
        return redirect()->to('/nilai')->with('message', 'Nilai berhasil ditambahkan');
    }
    public function detail($id)
    {
        $data = [
            'siswa' => $this->siswa->detail($id),
            'mapel' => $this->mapel->findAll(),
            'nilai' => $this->siswa->getNilai($id)
        ];
        if ($data['siswa'] == null) {
            return redirect()->back()->with('error', 'Siswa belum dimasukan ke data kelas, harap entry data siswa di menu Data kelas');
        }
        return view('nilai/detail', $data);
    }
    public function storeRapot($id)
    {
        $mapel = $this->mapel->findAll();
        $no = 1;
        $no1 = 1;
        $no2 = 1;
        $no3 = 1;
        $no4 = 1;
        foreach ($mapel as $m) {
            $data = [
                'siswa_id' => $id,
                'mapel_id' => $this->request->getPost('mapel_id' . $no++),
                'absensi' => $this->request->getPost('absensi' . $no1++),
                'tugas' => $this->request->getPost('tugas' . $no2++),
                'uts' => $this->request->getPost('uts' . $no3++),
                'uas' => $this->request->getPost('uas' . $no4++),
            ];
            $this->nilai->save($data);
        }
        return redirect()->to('/nilai')->with('message', 'Nilai berhasil ditambahkan');
    }

    public function updateRapot($id)
    {
        $mapel = $this->mapel->findAll();
        $no = 1;
        $no1 = 1;
        $no2 = 1;
        $no3 = 1;
        $no4 = 1;
        foreach ($mapel as $m) {
            $db = db_connect();
            $query = $db->query("SELECT * FROM nilai WHERE siswa_id = $id AND mapel_id = '$m[id_mapel]'");
            foreach ($query->getResultArray() as $q) {
                $data = [
                    'siswa_id' => $id,
                    'mapel_id' => $this->request->getPost('mapel_id' . $no++),
                    'absensi' => $this->request->getPost('absensi' . $no1++),
                    'tugas' => $this->request->getPost('tugas' . $no2++),
                    'uts' => $this->request->getPost('uts' . $no3++),
                    'uas' => $this->request->getPost('uas' . $no4++),
                ];
                $this->nilai->update($q['id_nilai'], $data);
            }
        }
        return redirect()->to('/nilai')->with('message', 'Nilai berhasil diubah');
    }

    public function cetakRapot($id)
    {
        $Pdfgenerator = new Pdfgenerator();
        $data['siswa'] = $this->siswa->detail($id);
        $data['nilai'] = $this->siswa->getNilai($id);
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('nilai/cetak', $data);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function editRapot($id)
    {
        $data = [
            'id_siswa' => $this->siswa->where('id_siswa', $id)->get()->getFirstRow(),
            'siswa' => $this->siswa->findAll(),
            'mapel' => $this->mapel->findAll(),
            'nilai' => $this->siswa->getNilai($id)
        ];
        return view('nilai/editNilai', $data);
    }
}
