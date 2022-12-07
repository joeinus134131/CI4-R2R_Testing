<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('dashboard');
        echo view('layouts/footer');
    }

    public function kontak()
    {
        $data = [
            'title' => 'Kontak'
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
            'title' => 'Kalender'
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
