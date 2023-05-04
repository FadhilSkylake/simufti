<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table            = 'kelas';
    protected $primaryKey        = 'id_kelas';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kelas', 'slug', 'id_jurusan', 'id_guru', 'angkatan',];

    public function getKelas($slug = false)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('kelas');
        $builder->select('kelas.*, jurusan.nama_jurusan, guru.nama_guru');
        $builder->join('guru', 'kelas.id_guru = guru.id_guru');
        $builder->join('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan');
        if ($slug != false) {
            $builder->where('kelas.slug', $slug);
            return $query = $builder->get()->getRow();
        } else {
            $builder->orderBy('kelas.id_kelas');
            $query = $builder->get();
            return $query->getResult();
        }
    }

    public function edit_siswa()
    {
        $db     = \Config\Database::connect();
        $db->table('kelas');
        $query = $db->query('SELECT `id_detail`, `siswa_id`, `kelas_id` FROM `siakad`.`detail_kelas` WHERE  `id_detail`=8;')->getResult();
        return $query;
    }
}
