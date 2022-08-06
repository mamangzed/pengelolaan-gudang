<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table            = 'tb_supplier';
    protected $allowedFields    = ['kode_supplier','nama_supplier','alamat','telepon'];
}
