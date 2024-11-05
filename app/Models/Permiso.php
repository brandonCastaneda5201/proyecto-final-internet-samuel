<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = [
        'user_id',
        'show-libro',
        'create-libro',
        'edit-libro',
        'delete-libro',
        'show-cliente',
        'create-cliente',
        'edit-cliente',
        'delete-cliente',
        'show-compra',
        'create-compra',
        'edit-compra',
        'delete-compra',
        'show-etiqueta',
        'create-etiqueta',
        'edit-etiqueta',
        'delete-etiqueta',
        'show-permiso',
        'create-permiso',
        'edit-permiso',
        'delete-permiso',
        'compra-libro',
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
