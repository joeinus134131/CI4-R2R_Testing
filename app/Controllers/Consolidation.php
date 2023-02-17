<?php

namespace App\Controllers;

class Consolidation extends BaseController
{
    public function consolidation()
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
        echo view('consolidation/consolidation', $data);
        echo view('layouts/footer');
        echo view('consolidation/js');
    }

    // public function import()
    // {
    //     if (isset($_FILES["file"]["name"])) {
    //         $path = $_FILES["file"]["tmp_name"];
    //         $object = PHPExcel_IOFactory::load($path);
    //         foreach ($object->getWorksheetIterator() as $worksheet) {
    //             $highestRow = $worksheet->getHighestRow();
    //             $highestColumn = $worksheet->getHighestColumn();
    //             for ($row = 2; $row <= $highestRow; $row++) {
    //                 $name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
    //                 $email = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
    //                 $phone = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    //                 $data[] = array(
    //                     'name'  => $name,
    //                     'email'  => $email,
    //                     'phone'   => $phone
    //                 );
    //             }
    //         }
    //         $this->excel_import_model->insert($data);
    //         echo 'Data Imported successfully';
    //     }
    //     $data[] = array(
    //         'name'  => $name,
    //         'email'  => $email,
    //         'phone'   => $phone
    //     );
    //     $this->excel_import_model->insert($data);
    //     $this->session->set_flashdata('messageupload', $data);
    //     echo json_encode($data);
    // }

    public function digital_sign()
    {
        $data = [
            'title' => 'Digital Sign',
            'iconset' => 'fa fa-cog',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
        ];
        echo view('annotation/dragndrop', $data);
    }
}
