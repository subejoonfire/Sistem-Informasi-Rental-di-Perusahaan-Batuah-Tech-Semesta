<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BusanaModel;

class PenyewaRental extends BaseController
{

    protected $Busana, $sewaModel, $pesananModel;
    public function __construct()
    {
        $this->Busana = new BusanaModel();
        $this->sewaModel = new \App\Models\SewaModel();
        $this->pesananModel = new \App\Models\PesananModel();
    }

    public function index()
    {
        return view('_rent_store/mainRent');
    }

    public function dataBusana()
    {
        $data = [
            'page'        => 'busana',
            'list_busana' => $this->Busana->getData(),
        ];
        // dd($data);
        return view('_rent_store/dataRent.php', $data);
    }
    public function setRental($id)
    {
        $data = [
            'id_busana' => $id,
            'row' => $this->Busana->join('tb_jenis_busana', 'tb_busana.id_jenis = tb_jenis_busana.id_jenis')
                ->join('(SELECT id_busana, SUM(stok) as stok, COUNT(ukuran) as jumlahUkuran FROM tb_ukuran GROUP BY id_busana) stok_query', 'tb_busana.id_busana = stok_query.id_busana', 'left')
                ->join('(SELECT id_busana, MIN(id_photoBusana) as id_photoBusana, photo_busana FROM tb_photobusana GROUP BY id_busana) tb_photobusana', 'tb_busana.id_busana = tb_photobusana.id_busana', 'left')
                ->where('tb_busana.id_busana', $id)
                ->get()->getRow()
        ];
        return view('_rent_store/detailRent', $data);
    }
    public function rentAction($id)
    {
        $row = $this->Busana->where('id_busana', $id)->get()->getRow();
        $id_voucher = $this->request->getPost('id_voucher');
        $jumlahsewa = $this->request->getPost('jumlahsewa');
        $status_sewa = $this->request->getPost('status_sewa');
        $jaminan = $this->request->getPost('jaminan');
        $pesan = $this->request->getPost('pesan');
        $deskripsisewa = $this->request->getPost('deskripsi_sewa');
        $tanggal_minjam = $this->request->getPost('tanggalpinjam');
        $tanggal_selesai = $this->request->getPost('tanggalselesai');
        $total_bayar = $row->harga_sewa * $jumlahsewa;
        $result = $this->sewaModel->insert([
            'tanggal_minjam' => $tanggal_minjam,
            'tanggal_selesai' => $tanggal_selesai,
            'status_sewa' => $status_sewa,
            'pesan' => $pesan,
            'jaminan' => $jaminan,
            'deskripsi_sewa' => $deskripsisewa,
            'total_bayar' => $total_bayar,
            'status_pembayran' => 'Belum bayar',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'id_voucher' => $id_voucher,
            'id_user' => session('id_user'),
        ]);

        $result1 = $this->pesananModel->insert([
            'nama_pesanan' => $row->nama_busana,
            'deskripsi_pesanan' => $deskripsisewa,
            'harga' => $total_bayar
        ]);
        if ($result && $result1) {
            return redirect()->to('/rentbusana')->with('message', 'Berhasil Membeli Barang');
        } else {
            return redirect()->to('/rentbusana')->with('message', 'Berhasil Membeli Barang');
        }
    }
}
