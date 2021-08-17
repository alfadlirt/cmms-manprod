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

        function getMaintenanceData()
        {
            $now = date_create()->format('Y-m-d');
            //$now = date('Y-m-d', strtotime('+7 days'));
            $then = date('Y-m-d', strtotime('-7 days'));
            require('builder.php');
            $builder = $db->table('mesin');
            $builder->select();
            $builder->where('tanggal_maintenance >=', $then);
            $builder->where('tanggal_maintenance <=', $now);
            return $builder->get()->getResultArray();
        }
    }

    
?>