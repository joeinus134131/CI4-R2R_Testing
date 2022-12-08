<?php

namespace App\Controllers;

use App\Models\AnotateModel;

class Anotate extends BaseController
{
    public function Attachment()
    {
        $model = new AnotateModel();
        foreach ($model->getAttachment()->getResult() as $row) {
            $data = [
                'title' => 'Attachment',
                'iconset' => 'pencil-alt',
                'icondel' => 'fa fa-trash',
                'iconadd' => 'fa fa-plus-square',
                'nama'  => $row->nama,
                'attachment' => $model->getFile()->getResult(),
            ];
        }

        echo view('layouts/header', $data);
        echo view('layouts/top_menu');
        echo view('layouts/side_menu');
        echo view('pages/anotation/attachment', $data);
        echo view('layouts/footer');
    }
    public function anotated()
    {
        $model = new AnotateModel();
        $id = $this->request->getVar('attach_id');
        $username = $model->getAttachment()->getResult();
        $data = [
            'title' => 'Anotate',
            'user' => 'Admin',
            'iconsave' => 'fa fa-pencil-square-o',
            'iconset' => 'edit',
            'icondel' => 'fa fa-trash',
            'iconadd' => 'fa fa-plus-square',
            'user_upload'  => $username,
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
        return redirect()->to('/pdf/attachment');
    }

    public function previewPdf($data)
    {
        $model = new AnotateModel();
        $attach_id = $this->request->getPost('attach_id');
        $data = array(
            'name'       => $this->request->getPost('name'),
            'document_type' => $this->request->getPost('document_type'),
        );
        $model->updateFile($data, $attach_id);
        return redirect()->to('/pdf/attachment');
    }

    public function delete()
    {
        $model = new AnotateModel();
        $attach_id = $this->request->getPost('attach_id');
        $model->deleteFile($attach_id);
        echo ("<script>alert('File has successfully deleted')</script>");
        return redirect()->to('/pdf/attachment-1');
    }

    public function upload()
    {
        helper(['form', 'url']);

        $database = \Config\Database::connect();
        $db = $database->table('attachment');

        $input = $this->validate([
            'berkas' => 'uploaded[berkas]|max_size[berkas, 20000]',
        ]);

        if (!$input) {
            echo ("<script>alert('File tidak sesuai')</script>");
            return redirect()->to('/pdf/attachment-1');
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
}
