<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VoucherModel;

class Voucher extends BaseController
{
    protected $voucherModel;

    public function __construct()
    {
        $this->voucherModel = new VoucherModel();
    }

    public function index()
    {
        $data = [
            'page' => 'voucher',
            'list_voucher' => $this->voucherModel->getData()
        ];

        // dd($data);
        return view('_voucher/indexVoucher', $data);
    }

    public function create()
    {
        $data = [
            'page'  => 'voucher',
        ];
        return view('_voucher/formVoucher', $data);
    }

    public function store()
    {
        $rules = [
            'nama_voucher' => [
                'rules'     => 'required|is_unique[tb_voucher.nama_voucher]|alpha_numeric_space',
                'errors'    => [],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();
        $nama_voucher = $this->request->getPost('nama_voucher');
        $token_voucher = $this->request->getPost('token_voucher');
        $potongan = $this->request->getPost('potongan');
        $jumlah_voucher = $this->request->getPost('jumlah_voucher');

        $result = $this->voucherModel->insert([
            'token_voucher' => $token_voucher,
            'nama_voucher' => $nama_voucher,
            'potongan' => $potongan,
            'jumlah_voucher' => $jumlah_voucher,
        ]);
        if ($result) {
            return redirect()->to('voucher')->with('message', 'Data Berhasil Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'page'       => 'Voucher',
            'row' => $this->voucherModel->where('id_voucher', $id)->get()->getRow(),
        ];
        return view('_voucher/detailVoucher', $data);
    }
    public function setVoucher($id)
    {
        $result = $this->voucherModel->where('id_voucher', $id)->set([
            'nama_voucher' => $this->request->getPost('nama_voucher'),
            'token_voucher' => $this->request->getPost('token_voucher'),
            'potongan' => $this->request->getPost('potongan'),
            'jumlah_voucher' => $this->request->getPost('jumlah_voucher'),
        ])->update();
        if ($result) {
            return redirect()->to('voucher')->with('message', 'Data Berhasil Diedit');
        }
    }
    public function delete($id)
    {
        $this->voucherModel->delete($id);
        return redirect()->to('voucher')->with('message', 'Data Berhasi Di Hapus');
    }
}
