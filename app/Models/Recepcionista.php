<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Recepcionista extends Model
{
    protected $table = 'recepcionistas';
    protected $primaryKey = 'id';
    public $incrementing = false;
    //protected $keyType = 'int';
    protected $fillable = ['id', 'turno'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id', 'id');
    }
}
