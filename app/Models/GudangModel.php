<?php

namespace App\Models;

use CodeIgniter\Model;

class GudangModel extends Model
{
    protected $table            = 'gudang';
    protected $allowedFields    = ['kode_barang','nama_barang','jenis_barang','jumlah','satuan'];

    public function findTrx($kode)
    {
        $cek = $this->where('kode_barang',$kode)->get();
        if($cek->getNumRows() < 1){
            return false;
        }else{
            return $cek->getRow();
        }
    }

    public function stok($msg)
    {
        $cek = $this->where('kode_barang',$msg)->orWhere('nama_barang',$msg)->get();
        if($cek->getNumRows() < 1){
            return false;
        }else{
            return $cek->getRow();
        }
    }
}
