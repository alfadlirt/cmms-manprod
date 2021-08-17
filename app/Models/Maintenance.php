<?php

    namespace APP\Models;

    use CodeIgniter\Model;

    class MaintenanceModel extends Model
    {
        protected $table = 'maintenance';
        protected $primaryKey = 'id_maintenance';
        protected $useTimestamps = false;
        protected $allowedFields = [
            'id_maintenance',
            'tanggal_maintenance',
            'tanggal_maintenance_selanjutnya',
            'id_mesin',
            'keterangan',
            'id_admin'
        ];
    }
?>