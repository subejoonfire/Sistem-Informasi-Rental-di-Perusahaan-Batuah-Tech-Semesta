<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DapurModel;

class Dapur extends BaseController
{
    protected $DapurModel;
    public function __construct()
    {
        $this->DapurModel = new DapurModel();
    }
    public function index()
    {
        $data = [
            'page' => 'Dapur',
            'list_dapur' => $this->DapurModel->getData()
        ];

        // dd($data);
        return view('_dapurbusana/indexDapur', $data);
    }

    public function create()
    {
        $data = [
            'page'  => 'dapur',
        ];
        return view('_dapurbusana/formDapur', $data);
    }

    public function store()
    {
        $rules = [
            'nama_dapur' => [
                'rules'     => 'required|is_unique[tb_busana.nama_busana]|alpha_numeric_space',
                'errors'    => [],
            ],
            'deskripsi_dapur'   => [
                'rules'     => "required",
                'errors'    => [],
            ],
            'harga_dapur'  => [
                'rules'     => "required|numeric|greater_than_equal_to[0]",
                'errors'    => [],
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        $result = $this->DapurModel->saveData($validData);
        if ($result) {
            return redirect()->to('dapur')->with('message', 'Data Berhasil DiTambah');
        }
    }

    public function edit($id)
    {

        $data = [
            'page' => 'Dapur',
            'form' => 'update',
            'row' => $this->DapurModel->where('id_dapur', $id)->get()->getRow(),
        ];
        return view('_dapurBusana/detailDapur', $data);
    }
    public function setDapur($id)
    {
        $result = $this->DapurModel->where('id_dapur', $id)->set([
            'nama_dapur' => $this->request->getPost('nama_dapur'),
            'deskripsi_dapur' => $this->request->getPost('deskripsi_dapur'),
            'harga_dapur' => $this->request->getPost('harga_dapur'),
        ])->update();
        if ($result) {
            return redirect()->to('dapur')->with('message', 'Data Berhasil Diedit');
        }
    }
    public function delete($id)
    {
        $this->DapurModel->delete($id);
        return redirect()->to('dapur')->with('message', 'Dapur Berhasi Di Hapus');
    }
}
