<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_pesanan'; // Ganti nama tabel menjadi tb_pesanan
    protected $primaryKey       = 'id_pesanan'; // Ganti nama primary key
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_pesanan', 'harga', 'deskripsi_pesanan']; // Ganti nama kolom

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

    public function getData($id = false)
    {
        if (!$id) return $this->findAll();

        return $this->findAll();
    }

    public function saveData($validData, $idPesanan = "")
    {
        $this->save([
            'id_pesanan'        => $idPesanan,
            'nama_pesanan'      => $validData['nama_pesanan'], // Ganti nama kolom
            'harga_pesanan'     => $validData['harga_pesanan'], // Ganti nama kolom
            'deskripsi_pesanan' => $validData['deskripsi_pesanan'], // Ganti nama kolom
        ]);

        return true;
    }
}
