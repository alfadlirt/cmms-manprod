<?php

namespace APP\Models;

use CodeIgniter\Model;

class TipeSpartModel extends Model
{
    protected $table = 'jenis_spart';
    protected $primaryKey = 'id_jenis_spart';
    protected $useTimestamps = false;
    protected $allowedFields =
    [
        'id_jenis_spart',
        'nama_jenis_spart',
        'status'
    ];
}
