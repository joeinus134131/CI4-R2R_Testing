<?php

namespace App\Controllers;

class Consolidation extends BaseController
{
    public function consol()
    {
        $data = [
            'title' => 'Consolidation',
            'iconset' => 'fa fa-cog',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/consolidation', $data);
        echo view('layouts/footer');
    }
}
