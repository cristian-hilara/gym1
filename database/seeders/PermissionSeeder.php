<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [

            'ver-administrador',
            'crear-administrador',
            'editar-administrador',
            'eliminar-administrador',
            //cliente
            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'eliminar-cliente',

            'ver-instructor',
            'crear-instructor',
            'editar-instructor',
            'eliminar-instructor',

            'ver-recepcionista',
            'crear-recepcionista',
            'editar-recepcionista',
            'eliminar-recepcionista',

            //roles
            'ver-role',
            'crear-role',
            'editar-role',
            'eliminar-role',

            //usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'eliminar-usuario',
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
