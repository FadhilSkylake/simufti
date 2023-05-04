<?php

namespace App\Models;

use CodeIgniter\Model;


/**
 * @method User|null first()
 */
class UsersModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $allowedFields  = [
        'email', 'username', 'password_hash', 'id_siswa', 'id_guru'
    ];
}
