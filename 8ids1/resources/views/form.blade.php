
@extends('layout')

@section('title','login')
@section('content')

<div class="container">
    <form action="{{ route('login.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Usuario: </label>
            <input type="text" class="form-control" name="usuario" id="usuario" required>
        </div>
        <div class="form-group">
            <label for="">Contraseña: </label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" required>
        </div><br>
        <button type="submit" class="btn btn-outline-success">Enviar</button>
    </form>
</div>