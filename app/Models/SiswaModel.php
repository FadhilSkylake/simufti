<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id_siswa';
    protected $allowedFields    = ['nama_siswa', 'slug', 'nisn', 'ttl', 'jenis_kelamin', 'agama', 'status_kel', 'alamat_siswa', 'sekolah_asal', 'tgl_diterima', 'ayah', 'ibu', 'alamat_ortu', 'no_tel_rumah', 'pekerjaan_ayah', 'pekerjaan_ibu', 'nama_wali', 'alamat_wali', 'no_wali', 'pekerjaan_wali', 'foto_siswa'];

    public function getDetailSiswa($slug = false)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.*, users.username, users.email, users.password_hash,');
        $builder->join('users', 'siswa.id_siswa = users.id_siswa');
        if ($slug != false) {
            $builder->where('siswa.slug', $slug);
            return $query = $builder->get()->getRow();
        } else {
            $builder->orderBy('siswa.id_siswa');
            $query = $builder->get();
            return $query->getResult();
        }
    }

    public function getSiswa($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    public function getNilaiSiswa()
    {
        $db = db_connect();
        return $db->query("SELECT siswa.id_siswa, siswa.nama_siswa FROM nilai JOIN siswa ON nilai.siswa_id = siswa.id_siswa GROUP BY nilai.siswa_id")->getResultArray();
    }

    public function joinNilai($id)
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.*, kelas.nama_kelas, nilai.*, mapel.nama_mapel');
        $builder->join('detail_kelas', 'siswa.id_siswa = detail_kelas.siswa_id');
        $builder->join('kelas', 'detail_kelas.kelas_id = kelas.id_kelas');
        $builder->join('nilai', 'nilai.siswa_id = siswa.id_siswa');
        $builder->join('mapel', 'nilai.mapel_id = mapel.id_mapel');
        $builder->where('nilai.siswa_id', $id);
        $kueri = $builder->get();
        return $kueri->getResultArray();
    }
    public function getNilai($id)
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->select('nilai.*, mapel.nama_mapel, ((nilai.absensi + nilai.tugas + nilai.uts + nilai.uas) /4) nilai_akhir');
        $builder->join('mapel', 'nilai.mapel_id = mapel.id_mapel');
        $builder->where('siswa_id', $id);
        return $query = $builder->get()->getResultArray();
    }
    public function detail($naonweh)
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->select('siswa.*, kelas.nama_kelas');
        $builder->join('detail_kelas', 'siswa.id_siswa = detail_kelas.siswa_id');
        $builder->join('kelas', 'kelas.id_kelas = detail_kelas.kelas_id');
        $builder->where('siswa.id_siswa', $naonweh);
        return $query = $builder->get()->getFirstRow();
    }
}
