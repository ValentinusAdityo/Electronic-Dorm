<?php

namespace App\Models;

use CodeIgniter\Model;

class Sewa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sewa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['biaya', 'tanggal_awal', 'masa_berlaku'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    private $biaya;
    private $tanggal_awal;
    private $masa_berlaku;
    private $data = [];
    private $pelanggan = [];
    private $kamar = [];
    private $admin = [];

    public function __construct($biaya, $tanggal_awal, $masa_berlaku, Pelanggan $pelanggan, Kamar $kamar, Admin $admin)
    {
        $this->biaya = $biaya;
        $this->tanggal_awal = $tanggal_awal;
        $this->masa_berlaku = $masa_berlaku;
        $this->pelanggan[] = $pelanggan;
        $this->kamar[] = $kamar;
        $this->admin[] = $admin;

        $validation = \Config\Services::validation();

        $this->data = [
            'biaya' => $this->biaya,
            'tanggal_awal' => $this->tanggal_awal,
            'masa_berlaku' => $this->masa_berlaku,
        ];

        $validation->setRules($this->validationRules);

        if (!$validation->run($this->data)) {
            return $this->validation->getErrors();
        }

        $db = \Config\Database::connect();
        parent::__construct($db);
    }

    public function setSewa(){
        
    }

    public function addPelanggan(){

    }

    public function addAdmin(){

    }

    public function addKamar(){

    }
}
