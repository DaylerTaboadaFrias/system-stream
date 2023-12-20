<?php

namespace App\Models;

use App\Models\Plataforma;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuenta extends Model
{
    use HasFactory;

    protected $table = "cuentas";
    public $timestamps = false;

    // public function getImagenMovilAttribute()
    // {
    //     return env('APP_URL').'/images/'.$this->imagen;
    // }

     public function plataforma()
     {
         return $this->belongsTo(Plataforma::class, 'id_plataforma');
     }
}
