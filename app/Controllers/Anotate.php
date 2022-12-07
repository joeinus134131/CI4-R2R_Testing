<?php

namespace App\Controllers;

use App\Models\AnotateModel;

class Anotate extends BaseController
{
    public function Attachment()
    {
        $model = new AnotateModel();
        $data = [
            'title' => 'Attachment',
            'iconset' => 'pencil-alt',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
            'user_upload'  => $model->getAttachment()->getResult(),
            'attachment' => $model->getFile()->getResult(),
        ];


        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/anotation/attachment', $data);
        echo view('layouts/footer');
    }
    public function anotated()
    {
        $model = new AnotateModel();
        $data = [
            'title' => 'Anotate',
            'iconsave' => 'fa fa-pencil-square-o',
            'iconset' => 'pencil-alt',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
            'user_upload'  => $model->getAttachment()->getResult(),
            'attachment' => $model->getFile()->getResult(),
        ];
        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/anotation/pdfanotate', $data);
        echo view('layouts/footer');
    }

    public function save()
    {

        $model = new AnotateModel();
        // $data = array(
        //     'document_type'        => $this->request->getPost('document_type'),
        //     'name'                 => $this->request->getPost('name'),
        //     'note'                 => $this->request->getPost('note'),
        // );
        // $model->saveFile($data);
        return redirect()->to('/pdf/attachment');
    }

    public function update($data)
    {
        $model = new AnotateModel();
        $attach_id = $this->request->getPost('attach_id');
        $data = array(
            'document_type'        => $this->request->getPost('document_type'),
            'name'       => $this->request->getPost('name'),
            'note' => $this->request->getPost('note'),
        );
        $model->updateFile($data, $attach_id);
        return redirect()->to('/pdf/attachment');
    }

    public function delete()
    {
        $model = new AnotateModel();
        $attach_id = $this->request->getPost('attach_id');
        $model->deleteFile($attach_id);

        echo ("<script>if (confirm('Data telah terhapus!')) {
            txt = 'You pressed OK!';");
        return redirect()->to('/pdf/attachment');
        echo ("  } else {
            txt = 'You pressed Cancel!';
          }</script>");
    }

    public function upload()
    {
        helper(['form', 'url']);

        $database = \Config\Database::connect();
        $db = $database->table('attachment');

        $input = $this->validate([
            'berkas' => 'uploaded[berkas]|max_size[berkas, 20000]',

            // 'avatar' => 'uploaded[avatar]|max_size[avatar,1024]',
        ]);

        if (!$input) {
            echo ("<script>alert('File tidak sesuai')</script>");
            // return redirect()->to('/pdf/attachment-1');
        } else {
            $file = $this->request->getFile('berkas');
            $file->move(FCPATH . 'uploads');

            $data = [
                'name' =>  $file->getName(),
                'document_type'  => $file->getClientMimeType(),
                'note' => $this->request->getPost('note'),
            ];
            $save = $db->insert($data);
            echo ("<script>alert('File has successfully uploaded')</script>");
            return redirect()->to('/pdf/attachment-1');
        }
    }
    function download($name = NULL)
    {
        // load download helder
        $this->load->helper('download');

        // read file contents
        $data = file_get_contents(base_url('/upload/' . $name));
        // force_download($name, $data);
    }
}
