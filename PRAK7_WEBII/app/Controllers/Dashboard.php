<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{   
    protected $modelBuku;
    
    public function __construct()
    {
        $this->modelBuku = new BookModel();
    }
    
    public function index()
    {   
        $data = [
            'buku' => $this->modelBuku->findAll(),
        ];
        return view('dashboard', $data);
    }

    public function create()
    {
        $this->modelBuku->insert($this->request->getPost());
        return redirect()->to('/dashboard');
    }

    public function update($id)
    {
        $this->modelBuku->update($id, $this->request->getPost());
        return redirect()->to('/dashboard');
    }

    public function delete($id)
    {
        $this->modelBuku->delete($id);
        return redirect()->to('/dashboard');
    }
}
