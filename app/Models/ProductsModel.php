<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 't_products'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'gambar', 'harga', 'is_popular']; // Atribut yang dapat diisi

    // Metode untuk menyimpan data kategori
    public function saveProduct($data)
    {
        return $this->insert($data);
    }

    public function getProducts($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    
}