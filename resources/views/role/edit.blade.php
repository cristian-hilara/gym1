@extends('template')

@section('title', 'editar rol')

@push('css')

@endpush

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Editar rol</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Editar rol</li>
    </ol>

    <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
        <form action="{{ route('roles.update', ['role'=>$role])}}" method="post">
        @method('PATCH')    
        @csrf
            <div class="row g-3">

                <!----nombre del rol------>
                <div class="row mb-4 mt-4">
                    <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                    <div class="row sm-4">
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name',$role->name)}}">
                    </div>
                    <div class="col-sm-6">
                        @error('name')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>

                </div>
                <!--permisos-->
                <div class="col-12 mb-4">
                    <label for="" class="form-label">Permisos para el rol:</label>

                    @foreach ($permisos as $item)

                    @if ( in_array($item->id, $role->permissions->pluck('id')->toArray()))
                    <div class="form-check mb-2">
                        <input checked type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div>
                    @else
                    <div class="form-check mb-2">
                        <input  type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                        <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                    </div>
                    @endif

                    @endforeach
                </div>
                @error('permission')
                <small class="text-danger">{{'*'.$message}}</small>
                @enderror


                <div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="reset" class="btn btn-secondary">Reniciar</button>
                </div>

            </div>
        </form>
    </div>

</div>

@endsection

@push('js')

@endpush