<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }
}
