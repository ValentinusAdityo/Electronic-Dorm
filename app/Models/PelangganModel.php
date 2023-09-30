<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $allowedFields = ['pelanggan_id', 'nama', 'alamat', 'no_hp', 'password'];

    public function simpan($record)
    {
        $this->save([
            'nama' => $record['nama'], //tolong ubah semua variable nama menjadi lebih spesifik seperti nama_pelanggan
            'email' => $record['email'],
            'alamat' => $record['alamat'],
            'no_hp' => $record['no_hp'],
            'password' => $record['password'],
        ]);
    }
}
