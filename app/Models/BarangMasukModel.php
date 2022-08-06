<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table            = 'barang_masuk';
    protected $allowedFields    = ['id_transaksi','tanggal','kode_barang','nama_barang','pengirim','jumlah','satuan'];


    

}
