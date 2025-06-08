@extends('template')

@section('title','Editar usuario')


@push('css')


@endpush


@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">editar usuario</li>
    </ol>

    <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
        <form action="{{ route('usuarios.update',['usuario'=>$usuario])}}" method="post">
            @method('PATCH')
            @csrf
            <div class="row g-3">

                <!----nombre del usuario------>
                <div class="row mb-2 mt-4">
                    <label for="nombre" class="col-sm-1 col-form-label">Nombres:</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre',$usuario->nombre)}}">
                    </div>
                    <div class="col-sm-2">
                        @error('nombre')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>
                <!----Apellido------>
                <div class="row mb-2 mt-4">
                    <label for="apellido" class="col-sm-1 col-form-label">Apellidos:</label>
                    <div class="col-sm-4">
                        <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido',$usuario->apellido)}}">
                    </div>
                    <div class="col-sm-2">
                        @error('apellido')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>
                <!----correo------>
                <div class="row mb-2 mt-4">
                    <label for="email" class="col-sm-1 col-form-label">Correo:</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email',$usuario->email)}}">
                    </div>
                    <div class="col-sm-2">
                        @error('email')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>
                <!----telefono------>
                <div class="row mb-2 mt-4">
                    <label for="telefono" class="col-sm-1 col-form-label">Telefono:</label>
                    <div class="col-sm-4">
                        <input type="number" name="telefono" id="telefono" class="form-control" value="{{old('telefono',$usuario->telefono)}}">
                    </div>
                    <div class="col-sm-2">
                        @error('telefono')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>
                <!----password------>
                <div class="row mb-2 mt-4">
                    <label for="password" class="col-sm-1 col-form-label">Contraseña:</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <div class="form-text">
                            Escriba una contraseña segura debe incluir numeros.
                        </div>

                    </div>
                    <div class="col-sm-2">
                        @error('password')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>
                <!----confirmar p el password------>
                <div class="row mb-2 mt-4">
                    <label for="password_confirm" class="col-sm-1 col-form-label">Confirmar Contraseña:</label>
                    <div class="col-sm-4">
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <div class="form-text">
                            Vuelva a escribir su contraseña.
                        </div>

                    </div>
                    <div class="col-sm-2">
                        @error('password_confirm')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>

                <!-- Foto -->
                <div class="row mb-2 mt-4">
                    <label for="foto" class="col-sm-1 col-form-label">Foto:</label>
                    <div class="col-sm-4">
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        @error('foto')
                        <small class="text-danger">{{ '*'.$message }}</small>
                        @enderror
                    </div>
                </div>

                <!----rol------>
                <div class="row mb-2 mt-4">
                    <label for="rol" class="col-sm-1 col-form-label">Seleccionar Rol:</label>
                    <div class="col-sm-4">
                        <select  name="rol" id="rol" class="form-select">
                            
                            @foreach ($roles as $item)

                            @if (in_array($item->name,$usuario->roles->pluck('name')->toArray()))
                                <option selected value="{{$item->name}}"@selected(old('rol')==$item->name)>{{$item->name}}</option>
                            @else
                                <option value="{{$item->name}}"@selected(old('rol')==$item->name)>{{$item->name}}</option>
                            @endif
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-text">
                            Escriba una contraseña segura debe incluir numeros.
                        </div>

                    </div>
                    <div class="col-sm-2">
                        @error('rol')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </div>
        </form>

    </div>
</div>

@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
{{-- Asegúrate de tener Bootstrap JS cargado en tu layout principal --}}
@endpush