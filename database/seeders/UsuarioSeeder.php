<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Admin',
            'apellido' => 'Principal',
            'email' => 'admin@ejemplo.com',
            'password' => Hash::make('tucontraseña'),
            'rol' => 'ADMINISTRADOR',
            // Los demás campos pueden quedarse sin poner porque son nullable o tienen valor por defecto
        ]);
    }
}
