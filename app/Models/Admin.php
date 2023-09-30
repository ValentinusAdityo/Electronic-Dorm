<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'no_hp', 'password'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama' => 'permit_empty|alpha_numeric_space|max_length[255]|min_length[3]',
        'no_hp' => 'permit_empty|numeric|max_length[15]|min_length[10]',
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
    private $password;

    public function __construct($nama, $no_hp, $password)
    {
        $this->nama = $nama;
        $this->no_hp = $no_hp;
        $this->password = $password;

        $validation = \Config\Services::validation();

        $data = [
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'password' => $this->password,
        ];

        $validation->setRules($this->validationRules);

        if (!$validation->run($data)) {
            return $validation->getErrors();
        }

        $db = \Config\Database::connect();
        parent::__construct($db);
    }

    public function getAdminData()
    {

        $query = $this->db->table($this->table)
            ->where('password', $this->password);

        if ($this->nama !== null) {
            $query->where('nama', $this->nama);
        }

        if ($this->no_hp !== null) {
            $query->where('no_hp', $this->no_hp);
        }

        $result = $query->get();

        if ($result->getNumRows() > 0) {
            return $result->getRowArray();
        } else {
            return null;
        }
    }
}
