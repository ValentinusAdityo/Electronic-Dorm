<?php

namespace App\Models;

use CodeIgniter\Model;

class Kamar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kamar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fasilitas', 'harga', 'deskripsi', 'status', 'gambar'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'fasilitas' => 'required',
        'harga' => 'required|numeric',
        'deskripsi' => 'required|alpha_space',
        'status' => 'required|in_list[0,1]',
        'gambar' => 'required',
    ];
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

    private $fasilitas;
    private $harga;
    private $deskripsi;
    private $status;
    private $gambar;

    private function validation()
    {
        $validation = \Config\Services::validation();

        $data = [
            'fasilitas' => $this->fasilitas,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'status' => $this->status,
            'gambar' => $this->gambar,
        ];

        $validation->setRules($this->validationRules);

        if (!$validation->run($data)) {
            return $validation->getErrors();
        }
        return true;
    }

    public function __construct($fasilitas = null, $harga = null, $deskripsi = null, $status = null, $gambar = null)
    {
        $this->fasilitas = $fasilitas;
        $this->harga = $harga;
        $this->deskripsi = $deskripsi;
        $this->status = $status;
        $this->gambar = $gambar;

        $db = \Config\Database::connect();
        parent::__construct($db);
    }

    public function getAllKamarData()
    {
        try {
            $query = $this->db->table($this->table)->get();

            if ($query->getNumRows() > 0) {
                return $query->getResult();
            } else {
                return "No records found";
            }
        } catch (\Exception $e) {
            // Handle any exceptions here
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function setKamarData()
    {
        if($this->validation()){
            try {
                $query = $this->db->table($this->table);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

    public function updateKamarData()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteKamarData()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
