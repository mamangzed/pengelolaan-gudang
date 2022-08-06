<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluar extends Model
{
    protected $table            = 'barang_keluar';
    protected $allowedFields    = ['user_nik','id_transaksi','tanggal','kode_barang','nama_barang','jumlah','tujuan','satuan','status'];

    public function findTrx($kode)
    {
        $cek = $this->where('id_transaksi',$kode)->get();
        if($cek->getNumRows() < 1){
            return false;
        }else{
            return $cek->getRow();
        }
    }
}
