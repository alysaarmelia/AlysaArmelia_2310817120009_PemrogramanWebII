<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'  => 'Harry Potter and the Chamber of Secrets',
                'penulis' => 'J. K. Rowling',
                'penerbit' => 'Bloomsbury Publishing',
                'tahun_terbit'   => 1998,
            ],
            [
                'judul'  => 'Harry Potter and the Prisoner of Azkaban',
                'penulis' => 'J. K. Rowling',
                'penerbit' => 'Bloomsbury Publishing',
                'tahun_terbit'   => 1999,
            ],
            [
                'judul'  => 'Harry Potter and the Goblet of Fire',
                'penulis' => 'J. K. Rowling',
                'penerbit' => 'Bloomsbury Publishing',
                'tahun_terbit'   => 2000,
            ],
        ];

        $this->db->table('buku')->insertBatch($data);
    }
}