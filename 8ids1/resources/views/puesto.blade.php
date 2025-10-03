@extends('adminlte::page')
    @section('content')
<h1>Guardar un Puesto nuevo</h1>
    <form action="{{ route('puesto.nuevo')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$puesto_var->id}}">
        <div class="form-group">
            <label for="">Código: </label>
            <input type="text" class="form-control" name="codigo" id="usuario" value="{{old('codigo',$puesto_var->codigo)}}" required>
            @error('codigo')
                {{$message}}
            @enderror
    </div>
        <div class="form-group">
            <label for="">Nombre: </label>
            <input type="text" class="form-control" name="nombre" id="contrasena" value="{{old('nombre',$puesto_var->nombre)}}" required>
            @error('nombre')
                {{$message}}
            @enderror
        </div><br>
        <button type="submit" class="btn btn-outline-primary">Guardar</button>
    </form>

@endsection


    