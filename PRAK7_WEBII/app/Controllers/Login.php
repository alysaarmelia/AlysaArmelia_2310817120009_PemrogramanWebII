<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function valid()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Username dan Password tidak boleh kosong.');
            return redirect()->to('/login');
        }

        $model = new UserModel();
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
                'isLog'    => true,
            ]);
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/dashboard')->with('success', 'Berhasil logout.');
    }
}