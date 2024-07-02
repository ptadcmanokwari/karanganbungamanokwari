<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialsModel extends Model
{
    protected $table = 't_testimoni';
    protected $primaryKey = 'id';
    protected $allowedFields = ['gambar', 'is_active'];

    public function getTestimonials($id = null)
    {
        if ($id === null) {
            return $this->orderBy('created_at', 'desc')->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function getActiveTestimonials()
    {
        return $this->where('is_active', 1)->findAll();
    }
}