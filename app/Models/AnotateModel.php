<?php

namespace App\Models;

use CodeIgniter\Model;

class AnotateModel extends Model
{

    public function getAttachment()
    {
        $builder = $this->db->table('user_upload');
        return $builder->get();
    }

    public function getFile()
    {
        $builder = $this->db->table('attachment');
        $builder->select('*');
        $builder->join('user_upload', 'role_id = attach_id', 'left');
        return $builder->get();
    }

    public function saveFile($data)
    {
        $query = $this->db->table('attachment')->insert($data);
        return $query;
    }

    public function updateFile($data, $attach_id)
    {
        $query = $this->db->table('attachment')->update($data, array('attach_id' => $attach_id));
        return $query;
    }

    public function deleteFile($attach_id)
    {
        $query = $this->db->table('attachment')->delete(array('attach_id' => $attach_id));
        return $query;
    }
}
