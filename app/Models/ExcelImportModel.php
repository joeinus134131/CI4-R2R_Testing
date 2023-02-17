<?php

namespace App\Models;

use CodeIgniter\Model;

class ExcelImportModel extends Model
{
    protected $db;
    protected $table = 'consolidation';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function simpanData($data)
    {
        $builder = $this->db->table('consolidation');
        $builder->insert($data);
    }
}
