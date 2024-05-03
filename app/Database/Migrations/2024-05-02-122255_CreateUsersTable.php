<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id'         => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'username'   => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
            'unique'     => true,
        ],
        'password'   => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
        ],
        'email'      => [
            'type'       => 'VARCHAR',
            'constraint' => '255',
            'unique'     => true,
        ],
        'created_at' => [
            'type'       => 'TIMESTAMP',
            'null'       => true,
        ],
        'updated_at' => [
            'type'       => 'TIMESTAMP',
            'null'       => true,
        ],
    ]);

    $this->forge->addPrimaryKey('id');
    $this->forge->createTable('users');
}


    public function down()
    {
        $this->forge->dropTable('users');
    }
}
