<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'foto',
        'rol',
        'requiere_cambio_contrasena',
        'fecha_registro',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    /**
     * Sobrescribir el campo de contraseña para autenticación.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Relación 1:1 con Administrador
     */
    public function administrador()
    {
        return $this->hasOne(Administradore::class, 'id', 'id');
    }

    /**
     * Relación 1:1 con Recepcionista
     */
    public function recepcionista()
    {
        return $this->hasOne(Recepcionista::class, 'id', 'id');
    }

    /**
     * Relación 1:1 con Instructor
     */
    public function instructor()
    {
        return $this->hasOne(Instructore::class, 'id', 'id');
    }

    /**
     * Relación 1:1 con Cliente
     */
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'id');
    }

    /**
     * Sobrescribir el campo de username para autenticación (opcional)
     */
    public function getAuthIdentifierName()
    {
        return 'email';
    }
}
