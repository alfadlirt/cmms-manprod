<?php

    namespace APP\Models;

    use CodeIgniter\Model;

    class MesinModel extends Model
    {
        protected $table = 'mesin';
        protected $primaryKey = 'id_mesin';
        protected $useTimestamps = false;
        protected $allowedFields = [
            'id_jenis_mesin',
            'nama',
            'tanggal_maintenance',
            'tanggal_dibuat',
            'tanggal_diubah',
            'status',
            'id_admin'
        ];
    }
?>