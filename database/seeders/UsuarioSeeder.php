<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= Usuario::create([
            'nombre' => 'Admin',
            'apellido'=>'Hilara',
            'email' => 'admin@ejemplo.com',
            'password' => Hash::make('tucontraseña'),
            'rol' => 'ADMINISTRADOR', //Esto soluciona el error
            // Los demás campos pueden quedarse sin poner porque son nullable o tienen valor por defecto
            
        ]);

        $rol=Role::create(['name'=>'ADMINISTRADOR']);
        $permisos= Permission::pluck('id','id')->all();
        $rol->syncPermissions($permisos);
        
        //$user= Usuario::find(2);
        $user->assignRole('ADMINISTRADOR');

                
    }
}
