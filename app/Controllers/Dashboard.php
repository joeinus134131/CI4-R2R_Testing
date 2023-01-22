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
        $email = $model->getVar('email');
        $query = $model->where('user_email', $email)->first();
        $data = [
            'title' => 'Dashboard Company Performance',
            'user' => 'Admin',
            'user_name'     => $query['user_name'],
            'user_email'    => $query['user_email'],
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
