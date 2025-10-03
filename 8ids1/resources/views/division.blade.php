@extends('adminlte::page')
    @section('content')
<h1>Guardar un código nuevo</h1>
    <form action="{{ route('division.nueva')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$div->id}}">
        <div class="form-group">
            <label class="form-label">Código: </label>
            <input type="text" class="form-control" name="codigo" id="usuario" value="{{old('codigo',$div->codigo)}}" required>
            @error('codigo')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="nombre" id="contrasena" value="{{old('nombre',$div->nombre)}}" required>
            @error('codigo')
            {{$message}}
        @enderror
    </div><br>
        <button type="submit" class="btn btn-outline-primary">Guardar</button>
    </form>

@endsection


    