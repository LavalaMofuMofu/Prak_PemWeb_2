<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => password_hash('buku123', PASSWORD_DEFAULT), // Password: buku123
        ];

        // Memasukkan data ke dalam tabel 'user'
        $this->db->table('user')->insert($data);
    }
}