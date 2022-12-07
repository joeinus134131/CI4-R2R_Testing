<?php

namespace App\Controllers;

class Performance extends BaseController
{
    public function company()
    {
        $data = [
            'title' => 'Company Performance',
            'iconset' => 'fa fa-cog',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/performance/company_performance', $data);
        echo view('layouts/footer');
    }

    public function agent()
    {
        $data = [
            'title' => 'Agent Performance',
            'iconset' => 'fa fa-cog',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/performance/agent_performance', $data);
        echo view('layouts/footer');
    }
}
