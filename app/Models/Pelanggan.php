<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

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
        'nama' => 'permit_empty|alpha_numeric_space|max_length[255]|min_length[3]',
        'alamat' => 'permit_empty',
        'no_hp' => 'permit_empty|numeric|max_length[15]|min_length[10]',
        'email' => 'permit_empty|valid_email|max_length[255]',
        'password' => 'required|max_length[16]|alpha_numeric_space|min_length[8]'
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

    public function __construct($nama, $no_hp, $email, $password, $alamat)
    {
        $this->nama = $nama;
        $this->no_hp = $no_hp;
        $this->email = $email;
        $this->password = $password;
        $this->alamat = $alamat;

        $validation = \Config\Services::validation();

        $this->data = [
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'password' => $this->password,
            'alamat' => $this->alamat,
        ];

        $validation->setRules($this->validationRules);

        if (!$validation->run($this->data)) {
            return $this->validation->getErrors();
        }

        $db = \Config\Database::connect();
        parent::__construct($db);
    }

    public function getPenggunaData()
    {
        $query = $this->db->table($this->table)->where('password', $this->password);

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

        if ($result->getNumRows() > 0) {
            return $result->getRowArray();
        } else {
            return null;
        }
    }

    public function setPenggunaData()
    {
        try {
            $this->db->table($this->table)->insert($this->data);
        } finally {
            return null;
        }
    }
}
