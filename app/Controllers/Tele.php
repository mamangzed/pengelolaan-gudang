<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\BarangKeluar;
use App\Models\UserModel;
use App\Models\GudangModel;
use App\Models\TeleModel;
use PhpParser\Node\Expr\FuncCall;

class Tele extends ResourceController
{
    protected $format    = 'json';

    public function __construct()
    {
        $this->barangKeluar = new BarangKeluar();
        $this->user = new UserModel();
        $this->gudang = new GudangModel();
        $this->tele = new TeleModel();
    }

    public function cekId($chat_id)
    {
        $cek = $this->user->cariTele($chat_id,true);
        if($cek == false){
            $data = [
                'status' => false,
                'code' => 400,
                'msg' => 'chat id tidak ditemukan'
            ];
        }else{
            $data = [
                'status' => true,
                'code' => 200,
                'msg' => 'chat id ditemukan'
            ];
        }
        return $this->respond($data,200);
    }

    public function add()
    {
        if(!$this->request->isSecure()){
            $data = [
                'status' => false,
                'code' => 405,
                'msg' => 'Permintaan kamu tidak aman'
            ];
        }elseif(empty($this->request->getPost('chatid'))){
            $data = [
                'status' => false,
                'code' => 404,
                'msg' => 'Pastikan semua data terisi'
            ];
        }elseif(empty($this->request->getPost('barang'))){
            $data = [
                'status' => false,
                'code' => 404,
                'msg' => 'Pastikan semua data terisi'
            ];
        }elseif(empty($this->request->getPost('tujuan'))){
            $data = [
                'status' => false,
                'code' => 404,
                'msg' => 'Pastikan semua data terisi'
            ];
        }elseif(empty($this->request->getPost('jumlah'))){
            $data = [
                'status' => false,
                'code' => 404,
                'msg' => 'Pastikan semua data terisi'
            ];
        }else{
            //DATA POST
            $chatId = $this->request->getPost('chatid');
            $barangcok = $this->request->getPost('barang');
            $tujuan = $this->request->getPost('tujuan');
            $jumlah = $this->request->getPost('jumlah');
            // ID TRANSAKSI
            $barang = $this->barangKeluar->orderBy('id','DESC')->first();
            $kode = $this->barangKeluar->orderBy('id','DESC')->countAllResults() == null ? 'TRK-0722000' : $barang['id_transaksi'];
            $urut = substr($kode, 8, 3);
            $tambah = (int) $urut + 1;
            $bulan = date("m");
            $tahun = date("y");
            
            if(strlen($tambah) == 1){
                $format = "TRK-".$bulan.$tahun."00".$tambah;
            } else if(strlen($tambah) == 2){
                $format = "TRK-".$bulan.$tahun."0".$tambah;
                
            } else{
                $format = "TRK-".$bulan.$tahun.$tambah;
            }
            //KODE BARANG
            $barang= $this->request->getPost('barang');
		    $pecah_barang = explode("|", $barang);
		    $kode_barang = $pecah_barang[0];
		    $nama_barang = $pecah_barang[1];
            $date = date('Y-m-d');
            //cek nik berdasarkan chat id
            $cekTele = $this->user->cariTele($this->request->getPost('chatid'));
            $nik = $cekTele->nik;
            //cek gudang
            $cekGudang = $this->gudang->findTrx($kode_barang);
            $jumlahGudang = $cekGudang->jumlah;
            $satuanGudang = $cekGudang->satuan;
            if($jumlah > $jumlahGudang){
                $data = [
                    'status' => false,
                    'code' => 404,
                    'msg' => 'Jumlah barang keluar melebihi batas gudang'
                ];
            }else{
                $insert = $this->barangKeluar->insert([
                    'user_nik' => $nik,
                    'id_transaksi' => $format,
                    'tanggal' => $date,
                    'kode_barang' => $kode_barang,
                    'nama_barang' => $nama_barang,
                    'jumlah' => $jumlah,
                    'tujuan' => $tujuan,
                    'satuan' => $satuanGudang,
                ]);
                if($insert){
                    $data = [
                        'status' => true,
                        'code' => 200,
                        'msg' => 'Berhasil menambahkan barang keluar '.$nama_barang
                    ];
                }else{
                    $data = [
                        'status' => false,
                        'code' => 404,
                        'msg' => 'Gagal menambahkan barang keluar'
                    ];
                }
            }
        }
        return $this->respond($data,200);
    }

    public function allBarang()
    {
        return $this->respond($this->gudang->findAll(),200);
    }

    public function cekCommand($chat_id)
    {
        return $this->respond($this->tele->cekCmd($chat_id),200);
    }

    public function setCmd($id,$no,$cmd)
    {
        return $this->respond($this->tele->setCmd($id,$no,$cmd),200);
    }

    public function loginTele($no)
    {
        $login = $this->user->loginTelepon($no);
        return $this->respond($login,200);
    }

    public function chatId($chatid)
    {
        $tt = $this->tele->tambahCmd($chatid);
        return $this->respond($tt,200);
    }
    
    public function cekKode($kode)
    {
        return $this->respond($this->gudang->findTrx($kode),200);
    }

    public function hapusCmd($id)
    {
        return $this->respond($this->tele->hapusCmd($id),200);
    }

    // ...
}