<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusanaModel;
use App\Models\JenisModel;

class JenisBusana extends BaseController
{
    protected $Jenis;
    protected $Busana;

    public function __construct()
    {
        $this->Jenis = new JenisModel();
        $this->Busana = new BusanaModel();
    }

    public function index()
    {

        $data = [
            'page' => 'jenis',
            'form' => 'tambah',
            'list_jenis' => $this->Jenis->select('tb_jenis_busana.*, COUNT(tb_busana.id_jenis) AS jumlah_busana', false)
                ->join('tb_busana', 'tb_jenis_busana.id_jenis = tb_busana.id_jenis', 'left')
                ->groupBy('tb_jenis_busana.id_jenis')
                ->get()->getResult(),
        ];
        return view('_jenisBusana/indexJenis', $data);
    }

    public function edit($id)
    {
        $data = [
            'page' => 'jenis',
            'form' => 'update',
            'row' => $this->Jenis->where('id_jenis', $id)->get()->getRow(),
        ];

        return view('_jenisBusana/detailJenis', $data);
    }

    public function store()
    {
        $rules = [
            'nama_jenis' => [
                'rules' => 'required|is_unique[tb_jenis_busana.nama_jenis]',
                'errors' => []
            ],
        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        $storeJenis = $this->Jenis->storeJenis($validData);

        if ($storeJenis) {
            return redirect()->to('/jenis')->with('message', 'Berhasil Menambahkan Jenis Busan');
        }
    }

    public function update($id)
    {
        $Jenis_Busana = $this->Jenis->getData($id);
        $rules = [
            'nama_jenis' => [
                'rules' => "required|is_unique[tb_jenis_busana.nama_jenis,nama_jenis,{$Jenis_Busana['nama_jenis']}]",
                'errors' => []
            ],
        ];

        // Pengecekan Validasi Rule
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $validData = $this->validator->getValidated();

        $storeJenis = $this->Jenis->storeJenis($validData, $id);

        if ($storeJenis) {
            return redirect()->to('/jenis')->with('message', 'Jenis Busan Berhasi Di Update');
        }
    }

    public function delete($id)
    {
        $this->Jenis->delete($id);
        return redirect()->to('/jenis')->with('message', 'Jenis Busan Berhasi Di Hapus');
    }
    public function setJenisBusana($id)
    {
        $this->Jenis->where('id_jenis', $id)->set('nama_jenis', $this->request->getPost('nama_jenis'))->update();
        return redirect()->to('/jenis')->with('message', 'Berhasil Mengupdate Jenis Busana');
    }
}
