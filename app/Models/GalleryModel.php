<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 't_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'is_active', 'is_show_home', 'kategori'];

    public function getGallery()
    {
        return $this->findAll();
    }

    // public function getAllGaleri()
    // {
    //     $builder = $this->db->table('t_gallery');
    //     $builder->select('t_gallery.*, t_products.nama AS nama_kategori');
    //     $builder->join('t_products', 't_products.id = t_gallery.kategori');
    //     return $builder->get()->getResultArray();
    // }

    public function getGalleryCategory()
    {
        $builder = $this->db->table('t_gallery');
        $builder->select('kategori');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }
}
