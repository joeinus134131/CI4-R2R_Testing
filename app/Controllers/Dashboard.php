<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM interco');
        $sum_query = $db->query('SELECT COUNT(*) FROM interco');
        $data = [
            'title' => 'Dashboard Company Performance',
            'user' => 'Admin',
            'sum_company' => '10'
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('dashboard/dashboard', $data);
        echo view('layouts/footer');
        echo view('dashboard/js');
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak',
            'user' => 'Admin',
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/kontak');
        echo view('layouts/footer');
    }
    public function calender()
    {
        $data = [
            'title' => 'Kalender',
            'user' => 'Admin',
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/calender');
        echo view('layouts/footer');
    }

    public function delete()
    {
        // $data = [
        //     'id_flow' => $this->request->getVar('id_flow');
        // ]

        echo view('action/delete');
        return redirect()->to('/');
    }
}
