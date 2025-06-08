<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Instructor extends Model
{
    protected $table = 'instructors';
    protected $primaryKey = 'id';
    public $incrementing = false;
    //protected $keyType = 'int';
    protected $fillable = ['id', 'especialidad', 'experiencia'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id', 'id');
    }
}
