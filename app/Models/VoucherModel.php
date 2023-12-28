<?php

namespace App\Models;

use CodeIgniter\Model;

class VoucherModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_voucher'; // Ganti nama tabel menjadi tb_voucher
    protected $primaryKey       = 'id_voucher'; // Ganti nama primary key
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_voucher', 'token_voucher', 'potongan', 'jumlah_voucher']; // Ganti nama kolom

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

    public function saveData($validData, $idVoucher = "")
    {
        $this->save([
            'id_voucher'        => $idVoucher,
            'nama_voucher'      => $validData['nama_voucher'], // Ganti nama kolom
            'harga_voucher'     => $validData['harga_voucher'], // Ganti nama kolom
            'deskripsi_voucher' => $validData['deskripsi_voucher'], // Ganti nama kolom
        ]);

        return true;
    }
}
