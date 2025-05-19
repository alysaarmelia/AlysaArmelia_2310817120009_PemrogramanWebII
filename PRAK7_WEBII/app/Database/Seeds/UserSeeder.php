<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'Alysa',
                'email'    => 'Alysa@gmail.com',
                'password' => password_hash('alysa1234', PASSWORD_DEFAULT),
            ],
            [
                'username' => 'Damar',
                'email'    => 'Damar@gmail.com',
                'password' => password_hash('damar1234', PASSWORD_DEFAULT),
            ]
        ];

        $this->db->table('user')->insertBatch($data);
    }
}