<?php

namespace App\Controllers;

class CekOngkir extends BaseController
{
    public $api_key = "2590a882bbb6f8e7b93fe20a893e5b20";
    public function index()
    {
        $data = [
            'title' => 'Cek Ongkir'
        ];
        return view('cekongkir/data', $data);
    }

    public function cek()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.rajaongkir.com/starter/city?key=' . $this->api_key . '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        $respon_json = json_decode($response);

        $data = array(
            'title' => 'Cek Ongkir',
            'hasil' => $respon_json,
        );

        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('cekongkir/data', $data);
        echo view('layouts/footer');
        echo view('cekongkir/js');
    }

    function cekongkir()
    {
        $asal_kota = $this-> input->post('asal');
        $tujuan_kota = $this->input->post('tujuan');
        $berat = $this->input->post('berat');
        $kurir = $this->input->post('kurir');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $asal_kota . "&destination=" . $tujuan_kota . "&weight=" . $berat . "&courier=" . $kurir,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->api_key,
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
