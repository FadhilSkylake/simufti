<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table            = 'kegiatan';
    protected $primaryKey       = 'id_kegiatan';
    protected $allowedFields = ['nama_kegiatan', 'slug', 'deskripsi', 'tempat', 'waktu_kegiatan', 'waktu_dibuat', 'dokumentasi'];

    public function getKegiatan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
