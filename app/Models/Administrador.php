<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Administrador extends Model
{
    protected $table = 'administradors';
    protected $primaryKey = 'id';
    public $incrementing = false;
    //protected $keyType = 'int';
    protected $fillable = ['id', 'area_responsabilidad'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id', 'id');
    }
}

