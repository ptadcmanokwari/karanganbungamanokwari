<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 't_gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'is_active', 'is_show_home', 'kategori'];

    public function getGallery($is_active = NULL, $is_show_home = NULL)
    {

        $builder = $this->db->table('t_gallery');

        if ($is_active != NULL) {
            $builder->where('is_active', $is_active);
        }

        if ($is_show_home != NULL) {
            $builder->where('is_show_home', $is_show_home);
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
