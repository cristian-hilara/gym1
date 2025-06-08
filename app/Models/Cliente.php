<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $incrementing = false;
    //protected $keyType = 'int';
    protected $fillable = ['id', 'fecha_nacimiento', 'estado_membresia'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id', 'id');
    }
}
