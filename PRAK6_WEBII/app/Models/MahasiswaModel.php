<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    public function getData()
    {
        return [
            'nama'   => 'Alysa Armelia',
            'nim'    => '231081712OOO9',
            'prodi'  => 'Teknologi Informasi',
            'lahir'  => 'Banjarmasin, 4 Mei 2005',
            'hobi'   => 'Menulis',
            'idola'  => 'Taylor Swift',
            'skill'  => [
                'Public Speaking' => 'Mampu berbicara di depan umum terkadang menjadi MC atau Koordinator Divisi.',
                'Concept Planner' => 'Selalu diandalkan dalam membuat planner acara ataupun planning suatu project.',
                'Desain Interior' => 'Mampu mendesain tata ruang dalam bangunan agar aesthetic dan sesuai kebutuhan fungsionalitasnya.',
            ],
        ];
    }
}
