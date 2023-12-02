<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederSewa extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect(); // Establish a database connection

        // Populate 'sewa' table with random data
        for ($i = 0; $i < 10; $i++) {
            $pelanggan = $db->table('pelanggan');
            $queryPelanggan = $pelanggan->orderBy('RAND()'); // Use 'orderBy' to order randomly
            $kamar = $db->table('kamar');
            $queryKamar = $kamar->orderBy('RAND()');

            $faker = \Faker\Factory::create();
            $data = [
                'biaya' => $faker->randomNumber(2)*10000, 
                'tanggal_awal' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)->format('Y-m-d H:i:s'),
                'masa_berlaku' => $faker->numberBetween(1,2),
                'id_pelanggan' => $queryPelanggan->get()->getRow()->id,
                'id_kamar' => $queryKamar->get()->getRow()->id,
            ];
            $this->db->table('sewa')->insert($data);
        }
    }
}
