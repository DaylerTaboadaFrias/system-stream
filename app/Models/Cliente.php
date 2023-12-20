<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";
    public $timestamps = false;

    // public function getImagenMovilAttribute()
    // {
    //     return '/images/' . $this->imagen;
    // }

    // public function levels()
    // {
    //     return $this . hasMany(Level::class, 'category_id');
    // }
}
