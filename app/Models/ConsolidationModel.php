<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsolidationModel extends Model
{
    protected $table = 'users';
    protected $primarykey = "user_id";
    protected $allowedFields = ['user_name', 'user_email', 'user_password', 'user_created_at'];

    public function getUserName()
    {
        return $this->db->table($this->table)->select('user_name')->get()->getResultArray();
    }
}
