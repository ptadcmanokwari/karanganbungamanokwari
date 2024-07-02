<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 't_slider';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'is_active', 'title', 'subtitle'];

    public function getSliders($id = null)
    {
        if ($id === null) {
            return $this->orderBy('created_at', 'desc')->findAll();
        } else {
            return $this->find($id);
        }
    }
}