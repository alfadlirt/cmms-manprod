<?php
    namespace APP\Models;

    use CodeIgniter\Model;

    class JenisMesinModel extends Model
    {
        protected $table = 'jenis_mesin';
        protected $primaryKey = 'id_jenis_mesin';
        protected $useAutoIncrement = true;
        protected $useTimestamps = false;
        protected $allowedFields = ['nama_jenis_mesin', 'status'];
    }
?>