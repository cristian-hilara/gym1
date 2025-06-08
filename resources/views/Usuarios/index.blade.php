@extends('template')

@section('title','usuarios')

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

@if (session('success'))
<script>
    let message = "{{ session('success') }}";
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: message
    });
</script>
@endif

<div class="container-fluid px-4">
    <h1 class="mt-4">Usuarios</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Registro de usuarios</li>
    </ol>

    <div class="mb-4">
        <a href="{{route('usuarios.create')}}">
            <button type='button' class="btn btn-primary"> Anadir Nuevo Usuario </button>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla Usuarios
        </div>

        <div class="table-responsive">
            <table id="datatablesSimple" class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>

                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Fecha registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->foto}}</td>
                        <td>{{$item->nombre }}</td>
                        <td>{{$item->apellido}}</td>
                        <td>{{$item->email }}</td>
                        <td>{{$item->telefono }}</td>
                        <td>{{$item->getRoleNames()->first() }}</td>
                        <td>{{$item->fecha_registro }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <form action="{{ route('usuarios.edit', ['usuario' => $item]) }}" method="get" style="display:inline;">
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                                @can('eliminar-usuario')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $item->id }}">
                                    Eliminar
                                </button>
                                @endcan

                            </div>
                        </td>
                    </tr>
                    <!--modales---->

                    <div class="modal fade" id="confirmModal-{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalLabel-{{ $item->id }}">Mensaje de confirmación</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Seguro que quieres eliminar el usuario?
                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                                    <form action="{{ route('usuarios.destroy', ['usuario' => $item->id]) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@push('js')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
@endpush