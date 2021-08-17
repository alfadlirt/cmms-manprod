<?php

namespace APP\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $useTimestamps = false;
    protected $allowedFields =
    [
        'id_supplier',
        'nama_supplier',
        'alamat',        
        'tanggal_dibuat',
        'terakhir_diubah',                
        'status' ,
        'id_admin' 
    ];
}
