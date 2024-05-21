<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'adminUser',
                'password' => password_hash('admin123_login', PASSWORD_BCRYPT),
                'email'    => 'adminUser@example.com',
            ],
        ];

        // Masukkan data ke dalam tabel admin
        $this->db->table('admin')->insertBatch($data);
    }
}
