<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    protected $request;
    public function index()
    {
        $session = session();
        $model = new DashboardModel();
        $data = [
            'title' => 'Dashboard Company Performance',
            'user' => 'Admin',
            'user_name'     => $model->getUserName(),
            'sum_company' => '10'
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu', $data);
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
