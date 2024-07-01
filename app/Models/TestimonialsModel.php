<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialsModel extends Model
{
    protected $table = 't_testimoni';
    protected $primaryKey = 'id';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useTimestamps = true;
    protected $allowedFields = ['gambar', 'is_active'];

    public function getTestimonials($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function getActiveTestimonials()
    {
        return $this->where('is_active', 1)->findAll();
    }
}
