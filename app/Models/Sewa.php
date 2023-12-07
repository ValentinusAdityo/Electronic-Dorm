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
    protected $validationRules      = [
        'biaya' => 'required',
        'tanggal_awal' => 'required',
        'masa_berlaku' => 'required',
        'id_pelanggan' => 'required',
        'id_kamar' => 'required',
        'created_at' => 'required|valid_date',
        'updated_at' => 'required|valid_date'
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

    private $biaya;
    private $tanggal_awal;
    private $masa_berlaku;
    private $id_pelanggan;
    private $id_kamar;
    private $data = [];

    private function validation($dataCreated){
        $validation = \Config\Services::validation();

        $this->data = [
            'biaya' => $this->biaya,
            'tanggal_awal' => $this->tanggal_awal,
            'masa_berlaku' => $this->masa_berlaku,
            'id_pelanggan' => $this->id_pelanggan,
            'id_kamar' => $this->id_kamar,
            'created_at' => $dataCreated,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $validation->setRules($this->validationRules);

        if (!$validation->run($this->data)) {
            return $this->validation->getErrors();
        }
        return true;
    }
    public function __construct($biaya, $tanggal_awal, $masa_berlaku, $id_pelanggan, $id_kamar)
    {
        $this->biaya = $biaya;
        $this->tanggal_awal = $tanggal_awal;
        $this->masa_berlaku = $masa_berlaku;
        $this->id_pelanggan = $id_pelanggan;
        $this->id_kamar = $id_kamar;

        $db = \Config\Database::connect();
        parent::__construct($db);
    }

    public function tambahSewa(){
        if($this->validation(date('Y-m-d H:i:s'))){
            try {
                $this->db->table($this->table)->insert($this->data);
                return true;
            }catch (\Exception $e) {
                // Handle any exceptions here
                return "An error occurred: " . $e->getMessage();
            }
        }
    }

    public function cariSewa($user_id){
        try {
            $result = $this->db->table($this->table)->where('id_pelanggan', $user_id)->get()->getResult();
            return $result;
        }catch (\Exception $e) {
            // Handle any exceptions here
            return "An error occurred: " . $e->getMessage();
        }
    }

    public function getAll(){
        try {
            $result = $this->db->table($this->table)->get();

            if ($result->getNumRows() > 0) {
                return $result->getResult();
            } else {
                return "No records found";
            }
        } catch (\Exception $e) {
            // Handle any exceptions here
            return "An error occurred: " . $e->getMessage();
        }
    }
}
