<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once(APPPATH . "../vendor/" . DIRECTORY_SEPARATOR . "autoload.php");

namespace App\Controllers;

class PdfViewer extends BaseController
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

    public function compare_view()
    {
        // // Get the uploaded PDF files
        // $pdf_files = $_FILES['pdf_file'];

        // // Loop through the PDF files and load each one into an iframe HTML
        // $data['pdfs'] = array();
        // foreach ($pdf_files['tmp_name'] as $file) {
        //     // Create a unique ID for the iframe element
        //     $id = 'pdf_' . md5($file);

        //     // Set the URL for the iframe element
        //     $url = base_url('pdf_viewer/view_pdf?pdf=' . urlencode($file));

        //     // Add the PDF iframe data to the array
        //     $data['pdfs'][] = array(
        //         'id' => $id,
        //         'url' => $url,
        //         'title' => 'Consolidation',
        //         'iconset' => 'fa fa-cog',
        //         'icondel' => 'fa fa-trash',
        //         'iconadd' => 'fa fa-plus-square',
        //     );
        // }
        // $data['pdfs'][] = array(
        //     // 'id' => $id,
        //     // 'url' => $url,
        //     'title' => 'Consolidation',
        //     'iconset' => 'fa fa-cog',
        //     'icondel' => 'fa fa-trash',
        //     'iconadd' => 'fa fa-plus-square',
        // );
        $data = [
            'title' => 'Digital Sign',
            'iconset' => 'fa fa-cog',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('viewpdf/form', $data);
        echo view('layouts/footer');
        echo view('consolidation/js');
    }
}
