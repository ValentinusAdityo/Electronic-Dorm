<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DbSeeder extends Seeder
{
    public function run()
    {
        $this->call('SeederAdmin');
        $this->call('SeederKamar');
        $this->call('SeederPelanggan');
        $this->call('SeederSewa');
    }
}
