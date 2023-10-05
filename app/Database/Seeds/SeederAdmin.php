<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAdmin extends Seeder
{
    public function run()
    {
        for($i=0; $i<10; $i++){
            $faker = \Faker\Factory::create();
            $data = [
                'nama' => $faker->name, 
                'no_hp' => $faker->numberBetween($min = 620000000000, $max = 629999999999),
                'password' => $faker->regexify('[0-9][A-Z][a-z]{8}')
            ];
            $this->db->table('admin')->insert($data);
        }
        
    }
}
