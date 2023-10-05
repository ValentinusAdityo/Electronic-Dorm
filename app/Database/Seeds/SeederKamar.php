<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederKamar extends Seeder
{
    public function run()
    {
        for($i=0; $i<100; $i++){
            $faker = \Faker\Factory::create();
            $data = [
                'fasilitas' => $faker->text,
                'harga' => $faker->randomNumber(2),
                'deskripsi' => $faker->text,
                'status' => $faker->numberBetween($min = 0, $max = 1),
                'gambar' => 'gambar.png',
            ];
            $this->db->table('kamar')->insert($data);
        }
    }
}
