<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\SessionInterface;

class Pelanggan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'alamat', 'no_hp', 'email', 'password'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created';
    protected $updatedField  = 'modified';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama' => 'required|alpha_numeric_space|max_length[255]|min_length[3]',
        'alamat' => 'required',
        'no_hp' => 'required|numeric|max_length[15]|min_length[10]',
        'email' => 'required|valid_email|max_length[255]',
        'password' => 'required|max_length[16]|alpha_numeric_space|min_length[8]',
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

    private $nama;
    private $no_hp;
    private $email;
    private $password;
    private $alamat;
    private $data;

    private function validation($dataCreated)
    {
        $validation = \Config\Services::validation();

        $this->data = [
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'password' => $this->password,
            'created_at' => $dataCreated,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $validation->setRules($this->validationRules);
        if (!$validation->run($this->data)) {
            return $this->validation->getErrors();
        }
        return true;
    }

    public function __construct($nama, $no_hp, $email, $password, $alamat)
    {
        $this->nama = $nama;
        $this->no_hp = $no_hp;
        $this->email = $email;
        $this->password = $password;
        $this->alamat = $alamat;

        $db = \Config\Database::connect();
        parent::__construct($db);
    }

    public function getPenggunaData()
    {
        $validation = \Config\Services::validation();

        $this->data = [
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'password' => $this->password,
        ];

        $validationRules = [
            'nama' => 'permit_empty|alpha_space|max_length[255]|min_length[3]',
            'no_hp' => 'permit_empty|numeric|max_length[15]|min_length[10]',
            'email' => 'permit_empty|valid_email|max_length[255]',
            'password' => 'required|max_length[16]|alpha_numeric_space|min_length[8]'
        ];

        $validation->setRules($validationRules);

        if (!$validation->run($this->data)) {
            return $this->validation->getErrors();
        }

        $query = $this->db->table($this->table)
            ->where('password', $this->password);

        if ($this->nama !== null) {
            $query->where('nama', $this->nama);
        }

        if ($this->no_hp !== null) {
            $query->where('no_hp', $this->no_hp);
        }

        if ($this->email !== null) {
            $query->where('email', $this->email);
        }

        $result = $query->get();

        return ($result->getNumRows() > 0) ? $result->getRowArray() : null;
    }

    public function setPenggunaData()
    {
        if ($this->validation(date('Y-m-d H:i:s'))) {
            try {
                $this->db->table($this->table)->insert($this->data);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    public function updatePenggunaData(SessionInterface $session)
    {
        if ($this->validation($session->get('created_at'))) {
            try {
                $resultDb=$this->db->table($this->table)->where('id', $session->get('id'))->update($this->data);
                $updatedData = $this->db->table($this->table)->where($session->get('id'))->get()->getRow();
                return $updatedData;
            } catch (\Exception $e) {
                return null;
            }
        }
    }

    public function deletePenggunaData(SessionInterface $session)
    {
        if ($this->validation($session->get('created_at'))) {
            try {
                $this->db->table($this->table)->delete($session->get('id'));
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }

    public function cariPelanggan($user_name)
    {
        try {
            $result = $this->db->table($this->table)->where('nama', $user_name)->get()->getResult();
            return $result;
        } catch (\Exception $e) {
            // Handle any exceptions here
            return "An error occurred: " . $e->getMessage();
        }
    }
}
