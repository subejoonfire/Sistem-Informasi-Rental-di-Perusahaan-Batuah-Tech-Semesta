<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $Paket;
    public function __construct()
    {
        $this->Paket = new PaketModel();
    }
    public function index()
    {
        $data = [
            'page' => 'paket',
            'list_paket' => $this->Paket->getData()
        ];

        // dd($data);
        return view('_paket/indexPaket', $data);
    }

    public function create()
    {
        $data = [
            'page'  => 'paket',
        ];
        return view('_paket/formPaket', $data);
    }

    public function store()
    {
        $rules = [
            'nama_paket' => [
                'rules'     => 'required|is_unique[tb_busana.nama_busana]|alpha_numeric_space',
                'errors'    => [],
            ],
            'deskripsi_paket'   => [
                'rules'     => "required",
                'errors'    => [],
            ],
            'harga_paket'  => [
                'rules'     => "required|numeric|greater_than_equal_to[0]",
                'errors'    => [],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        $file = $this->request->getFile('photo_paket');
        $fileName = $file->getName();
        $file->move(ROOTPATH . '/public/uploads/', $fileName);
        $result = $this->Paket->insert([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'deskripsi_paket' => $this->request->getPost('deskripsi_paket'),
            'harga_paket' => $this->request->getPost('harga_paket'),
            'photo_paket' => $fileName,
        ]);
        if ($result) {
            return redirect()->to('paket')->with('message', 'Data Berhasil DiTambah');
        }
    }

    public function edit($id)
    {
        $data = [
            'page'       => 'Paket',
            'row' => $this->Paket->where('id_paket', $id)->get()->getRow(),
        ];
        return view('_paket/detailPaket', $data);
    }
    public function delete($id)
    {
        $this->Paket->delete($id);
        return redirect()->to('/paket')->with('message', 'Paket Berhasi Di Hapus');
    }
    public function setPaket($id)
    {
        $photo_paket = $this->request->getFile('photo_paket');
        $nama_paket = $this->request->getPost('nama_paket');
        $deskripsi_paket = $this->request->getPost('deskripsi_paket');
        $harga_paket = $this->request->getPost('harga_paket');
        if ($photo_paket->getName() == '') {
            $result = $this->Paket->where('id_paket', $id)->set([
                'nama_paket' => $nama_paket,
                'deskripsi_paket' => $deskripsi_paket,
                'harga_paket' => $harga_paket,
            ])->update();
            if ($result) {
                return redirect()->to('paket')->with('message', 'Data Berhasil DiTambah');
            }
        } else {
            $photo_paket->move(ROOTPATH . '/public/uploads/', $photo_paket->getName());
            $result = $this->Paket->where('id_paket', $id)->set([
                'nama_paket' => $nama_paket,
                'deskripsi_paket' => $deskripsi_paket,
                'harga_paket' => $harga_paket,
                'photo_paket' => $photo_paket->getName(),
            ])->update();
            if ($result) {
                return redirect()->to('paket')->with('message', 'Data Berhasil DiTambah');
            }
        }
    }
}
