<?php

namespace App\Controllers;

class Configplugin extends BaseController
{

    public function rules()
    {
        $data = [
            'title' => 'Rules Setting'
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/rules', $data);
        echo view('layouts/footer');
    }

    public function aidecision()
    {
        $data = [
            'title' => 'Ai Decision'
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/aidecision', $data);
        echo view('layouts/footer');
    }
}
