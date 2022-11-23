<?php

namespace App\Controllers;

class Consolidation extends BaseController
{
    public function consol()
    {
        $data = [
            'title' => 'Consolidation'
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/consolidation');
        echo view('layouts/footer');
    }
}
