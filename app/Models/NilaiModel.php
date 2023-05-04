<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table            = 'nilai';
    protected $primaryKey       = 'id_nilai';
    protected $allowedFields    = ['siswa_id', 'mapel_id', 'absensi', 'tugas', 'uts', 'uas'];

    function getNilai($id_nilai = false)
    {
        $db     = \Config\Database::connect();
        // $db->table('nilai');
        // $query = $db->query('SELECT nilai.*,siswa.nama_siswa, ((nilai.ips + nilai.ipa) / 2 ) total FROM nilai JOIN siswa ON nilai.siswa_id = siswa.id_siswa')->getResult();

        $builder = $db->table('nilai');
        $builder->select('nilai.*, siswa.nama_siswa, mapel.nama_mapel');
        $builder->join('siswa', 'nilai.siswa_id = siswa.id_siswa');
        $builder->join('mapel', 'nilai.mapel_id = mapel.id_mapel');
        $builder->where('id_nilai', $id_nilai);
        $kueri = $builder->get();
        return $kueri->getResult();
        // dd($kueri);


        // return $query;
        // $builder->select('nilai.*, siswa.nama_siswa');
        // $builder->join('siswa', 'nilai.siswa_id = siswa.id_siswa');
        // $kueri = $builder->get();
        // return $kueri->getResult();

    }

    public function detail()
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('nilai');
        $builder->select('nilai.*, siswa.nama_siswa, kelas.nama_kelas');
        $builder->join('siswa', 'nilai.siswa_id = siswa.id_siswa');
        $builder->join('kelas', 'nilai.kelas_id = kelas.id_kelas');
        // $builder->where('id_siswa', $id_siswa);
        $kueri = $builder->get();
        return $kueri->getResult();
    }
}
