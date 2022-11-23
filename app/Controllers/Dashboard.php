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
    public function create()
    {
    }

    public function delete($data)
    {
        $this->DashboardModel->deletefield($data);
        return redirect()->to('/');
    }
}
