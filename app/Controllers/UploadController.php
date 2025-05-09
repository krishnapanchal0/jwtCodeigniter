<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload_form');
    }

    public function upload()
    {
        $files = $this->request->getFiles();

        if ($files) {
            foreach($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $img->move('uploads');
                }
            }
        }

        return redirect()->to('/upload')->with('message', 'Images uploaded successfully!');
    }
}
