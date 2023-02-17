<?php

namespace App\Controllers;

use App\Models\ExcelImportModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelImport extends BaseController
{
    protected $excelImportModel;

    public function __construct()
    {
        $this->excelImportModel = new ExcelImportModel();
    }

    public function index()
    {
        return view('excel_import');
    }

    public function import()
    {
        $file_mimes = ['application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = IOFactory::createReader('Csv');
            } else {
                $reader = IOFactory::createReader('Xlsx');
            }

            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for ($i = 0; $i < count($sheetData); $i++) {

                $data = [
                    'title' => "consolidation",
                    'nama_perusahaan' => $sheetData[$i][0],
                    'kode_account' => $sheetData[$i][1],
                    'namaaccount' => $sheetData[$i][2],
                ];

                if ($this->excelImportModel->simpanData($data)) {
                    $data['success'] = 'Data Imported successfully.';
                } else {
                    $data['error'] = 'Error Occured';
                }
            }

            echo view('layouts/header', $data);
            echo view('layouts/top_menu');
            echo view('layouts/side_menu');
            echo view('consolidation/consolidation', $data);
            echo view('layouts/footer');
            echo view('consolidation/js');
        } else {
            $data['error'] = 'Invalid File';
            return view('excel_import', $data);
        }
    }
}
