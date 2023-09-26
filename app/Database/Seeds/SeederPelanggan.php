<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPelanggan extends Seeder
{
    public function run()
    {
        for($i=0; $i<100; $i++){
            $faker = \Faker\Factory::create();
            $data = [
                'nama' => $faker->name, 
                'alamat' => $faker->address,
                'no_hp' => $faker->numberBetween($min = 620000000000, $max = 629999999999),
                'email' => $faker->email,
                'password' => $faker->password
            ];
            $this->db->table('pelanggan')->insert($data);
        }
    }
}
