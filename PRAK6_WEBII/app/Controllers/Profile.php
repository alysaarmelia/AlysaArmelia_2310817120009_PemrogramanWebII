<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Profile extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->getData();
        return view('profile', $data);
    }
}