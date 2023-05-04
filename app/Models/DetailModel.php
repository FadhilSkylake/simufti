<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table            = 'detail_kelas';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['siswa_id', 'kelas_id'];

    function getDetail($id_kelas)
    {
        $db     = \Config\Database::connect();
        $builder = $db->table('detail_kelas');
        $builder->select('detail_kelas.*, siswa.nama_siswa, kelas.id_kelas');
        $builder->join('siswa', 'detail_kelas.siswa_id = siswa.id_siswa');
        $builder->join('kelas', 'detail_kelas.kelas_id = kelas.id_kelas');
        $builder->where('kelas_id', $id_kelas);
        $kueri = $builder->get();
        return $kueri->getResult();
        // if ($id_kelas != false) {
        //     $builder->where('detail_kelas.kelas_id', $id_kelas);
        //     return $kueri = $builder->get()->getRow();
        // } else {
        //     $builder->orderBy('detail_kelas.id_detail');
        //     $kueri = $builder->get();
        //     return $kueri->getResult();
        // }
    }
}
