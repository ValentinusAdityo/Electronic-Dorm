<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'nama'       => ['type' => 'varchar', 'constraint' => 255],
            'no_hp'      => ['type' => 'int', 'constraint' => 15],
            'password'    => ['type' => 'varchar', 'constraint' => 255],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin');
        
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}
