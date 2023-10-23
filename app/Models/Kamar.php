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
        'nama' => 'required|alpha_space|max_length[255]|min_length[3]',
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

    private $nama;
    private $fasilitas;
    private $harga;
    private $deskripsi;
    private $status;
    private $gambar;
    private $data;

    private function validation()
    {
        $validation = \Config\Services::validation();

        $this->data = [
            'nama' => $this->nama,
            'fasilitas' => $this->fasilitas,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'status' => $this->status,
            'gambar' => $this->gambar,
        ];

        $validation->setRules($this->validationRules);

        if (!$validation->run($this->data)) {
            return $validation->getErrors();
        }
        return true;
    }

    public function __construct($nama = null, $fasilitas = null, $harga = null, $deskripsi = null, $status = null, $gambar = null)
    {
        $this->nama = $nama;
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
                $this->db->table($this->table)->insert($this->data);
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }

    public function updateKamarData($id)
    {
        if($this->validation()){
            try {
                $this->db->table($this->table)->where('id', $id)->update($this->data);
                $updatedData = $this->db->table($this->table)->where('id', $id)->get()->getRow();
                return $updatedData;
            } catch (\Throwable $th) {
                return null;
            }
        }
    }

    public function deleteKamarData($id)
    {
        if($this->validation()){
            try {
                $this->db->table($this->table)->where('id', $id)->delete();
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
}
