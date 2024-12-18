<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }
    public function archivo(){
        return $this->hasOne(Archivo::class);
    }
}
