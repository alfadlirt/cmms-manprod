<?php

namespace APP\Models;

use CodeIgniter\Model;

class SpartModel extends Model
{
    protected $table = 'spare_part';
    protected $primaryKey = 'id_spare_part';
    protected $useTimestamps = false;
    protected $allowedFields =
    [
        'id_spare_part',
        'id_jenis_spart',
        'nama',
        'id_supplier',
        'tanggal_dibuat',
        'tanggal_diubah',
        'status',
        'id_admin'
    ];
}
