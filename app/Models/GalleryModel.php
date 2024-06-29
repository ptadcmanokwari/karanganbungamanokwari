<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 't_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'is_active', 'is_show_home', 'kategori'];

    public function getGallery($is_show_home=NULL)
    {
        
        $builder = $this->db->table('t_gallery');
        $builder->where('is_active', 1);
        if($is_show_home != NULL)
        {
            $builder->where('is_show_home', 1);

        } 
        return $builder->get()->getResultArray();
    }

    public function getGalleryCategory() 
    {
        $builder = $this->db->table('t_gallery');
        $builder->select('kategori');
        $builder->distinct();
        return $builder->get()->getResultArray();
    }
}