<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sewa extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'biaya'       => ['type' => 'double'],
            'tanggal_awal'      => ['type' => 'datetime'],
            'masa_berlaku'    => ['type' => 'int', 'constraint' => 5],
            'id_pelanggan' => ['type' => 'int', 'constraint' => 9],
            'id_kamar' => ['type' => 'int', 'constraint' => 2],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kamar', 'kamar', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sewa');
    }

    public function down()
    {
        $this->forge->dropTable('sewa');
    }
}
