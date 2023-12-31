<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamar extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'nama'       => ['type' => 'varchar', 'constraint' => 255],
            'fasilitas'      => ['type' => 'text'],
            'harga'    => ['type' => 'double'],
            'deskripsi' => ['type' => 'text'],
            'status' => ['type' => 'int', 'constraint' => 1],
            'gambar' => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('kamar');
    }

    public function down()
    {
        $this->forge->dropTable('kamar');
    }
}
