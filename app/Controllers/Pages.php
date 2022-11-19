<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'R2R Management Infomedia | Home'
        ];

        echo view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'R2R Management Infomedia | About'
        ];;
        echo view('pages/about', $data);
    }

    public function kontak()
    {
        $data = [
            'title' => 'R2R Management Infomedia | Kontak'
        ];

        echo view('pages/kontak', $data);
    }
}
