<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'nama'       => ['type' => 'varchar', 'constraint' => 255],
            'alamat'        => ['type' => 'text'],
            'no_hp'      => ['type' => 'int', 'constraint' => 15],
            'email'       => ['type' => 'varchar', 'constraint' => 255],
            'password'    => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
