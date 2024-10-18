<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function libros(){
        return $this->belongsToMany(Libro::class);
    }
}
