<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|eliminar-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-usuario', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Usuario::all();
        return view('Usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('Usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        try {
            DB::beginTransaction();

            //encripta contraseña
            $fieldHash = Hash::make($request->password);
            //notifica el valor de password en request

            $request->merge(['password' => $fieldHash]);

            //crear usuario
            $user = Usuario::create($request->all());
            //asignar rol
            $user->assignRole($request->rol);





            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('usuarios.index')->with('success', 'Usuario Registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $roles = Role::all();
        return view('Usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        try {
            Db::beginTransaction();

            //comoprobar el password y aplicar hash

            if (empty($request->password)) {
                $request = Arr::except($request, array('password'));
            } else {
                $fieldHash = Hash::make($request->password);
                $request->merge(['password' => $fieldHash]);
            }
            $usuario->update($request->all());

            //actualizar rol
            $usuario->syncRoles([$request->rol]);
            // $usuario->syncRoles(array_map(fn($val) => (int)$val, $request->input('role')));


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('usuarios.index')->with('success', 'Usuario Editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);

        //elimina rol
        $rolUsuario = $usuario->getRoleNames()->first();
        $usuario->removeRole($rolUsuario);

        //elimina usuario
        $usuario->delete();

        //Usuario::where('id', $id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado');
    }
}
