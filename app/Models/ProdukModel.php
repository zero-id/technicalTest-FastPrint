<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'data_produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_produk', 'nama_produk', 'harga', 'kategori', 'status']; // Daftar kolom yang dapat diisi
}
