<?php

namespace APP\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $useTimestamps = false;
    protected $allowedFields =
    [
        'id_admin',
        'nama_admin',
        'role',
        'email_admin',
        'username',
        'password',
        'date_created',
        'last_modified',
        'created_by',
        'status'
    ];
}
