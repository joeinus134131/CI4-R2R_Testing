<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'users';
    protected $primary_key = "user_id";
    protected $allowedFields = ['user_name', 'user_email', 'user_password', 'user_created_at'];

    public function getVar($var)
    {
        $session = session();
        $email = $session->get('email');
        $query = $this->where('user_email', $email)->first();
        return $query[$var];
    }
}
