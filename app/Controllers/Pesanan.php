<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class Pesanan extends BaseController
{
    protected $pesananModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
    }

    public function index()
    {
        $data = [
            'page' => 'pesanan',
            'list_pesanan' => $this->pesananModel->getData()
        ];

        // dd($data);
        return view('_pesanan/indexPesanan', $data);
    }

    public function create()
    {
        $data = [
            'page'  => 'pesanan',
        ];
        return view('_pesanan/formPesanan', $data);
    }

    public function store()
    {
        $rules = [
            'nama_pesanan' => [
                'rules'     => 'required|is_unique[tb_pesanan.nama_pesanan]|alpha_numeric_space',
                'errors'    => [],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        $nama_pesanan = $this->request->getPost('nama_pesanan');
        $deskripsi_pesanan = $this->request->getPost('deskripsi_pesanan');
        $harga = $this->request->getPost('harga');

        $result = $this->pesananModel->insert([
            'nama_pesanan' => $nama_pesanan,
            'deskripsi_pesanan' => $deskripsi_pesanan,
            'harga' => $harga,
        ]);
        if ($result) {
            return redirect()->to('pesanan')->with('message', 'Data Berhasil Ditambahkan');
        }
    }

    public function edit($id)
    {
        $data = [
            'page'       => 'Voucher',
            'id_pesanan' => $id,
            'row' => $this->pesananModel->where('id_pesanan', $id)->get()->getRow(),
        ];
        return view('_pesanan/detailPesanan', $data);
    }
    public function setPesanan($id)
    {
        $result = $this->pesananModel->where('id_pesanan', $id)->set([
            'nama_pesanan' => $this->request->getPost('nama_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'harga' => $this->request->getPost('harga'),
        ])->update();
        if ($result) {
            return redirect()->back()->with('message', 'Data Berhasil Diedit');
        }
    }
    public function delete($id)
    {
        $this->pesananModel->delete($id);
        return redirect()->to('pesanan')->with('message', 'Data Berhasi Di Hapus');
    }
}
