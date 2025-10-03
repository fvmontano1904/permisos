@extends('adminlte::page')
    @section('content')
<h1>Guardar un Profesor nuevo</h1>
    <form action="{{ route('profesor.nuevo')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$profesor_var->id}}">
        <div class="form-group">
            <label for="">Número: </label>
            <input type="text" class="form-control" name="numero" id="numero" value="{{old('numero',$profesor_var->numero)}}" required>
            @error('numero')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="">Nombre: </label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre',$profesor_var->nombre)}}" required>
            @error('nombre')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="">Horas Asignadas: </label>
            <input type="text" class="form-control" name="horas_asignadas" id="horas_asignadas" value="{{old('horas_asignadas',$profesor_var->horas_asignadas)}}" required>
            @error('horas_asignadas')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="">Dias Economicos: </label>
            <input type="text" class="form-control" name="dias_eco_corre" id="dias_eco_corre" value="{{old('dias_eco_corre',$profesor_var->dias_eco_corre)}}" required>
            @error('dias_eco_corre')
                {{$message}}
            @enderror
        </div>
       
        <div class="form-group">
            <label for="">Usuario: </label>
            <select class="form-control" name="id_usuario" id="">
                @foreach($users as $user)
                <option value="{{$user->id}}"  {{$user->id == $profesor_var->id_usuario ? 'selected':''}}>{{$user->name}}</option>
                @endforeach
            </select>
         </div>
        <div class="form-group">
            <label for="">Puesto: </label>
            <select class="form-control" name="id_puesto" id="id_puesto">
                @foreach($puesto as $puest)
                <option value="{{$puest->id}}" {{$puest->id == $profesor_var->id_puesto ? 'selected':''}}>{{$puest->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Division: </label>
            <select class="form-control" name="id_division" id="divisio">
                @foreach($division as $divisio)
                <option value="{{$divisio->id}}"  {{$divisio->id == $profesor_var->id_division ? 'selected':''}}>{{$divisio->nombre}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-primary">Guardar</button>
    </form>

@endsection


    