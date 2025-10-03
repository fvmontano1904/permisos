
@extends('adminlte::page')
    @section('content')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Profesores</h3>
            </div>
            <div class="box-body">
                <table id="table-data" class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Nombre</th>
                            <th>Horas Asignadas</th>
                            <th>Dias Economicos</th>
                            <th>Usuario</th>
                            <th>Puesto</th>
                            <th>Division</th>

                        </tr>
                    </thead>
                    <tbody >
                        @foreach($profesor_var as $profe)
                        <tr>
                            <td>{{$profe['numero']}}</td>
                            <td>{{$profe['nombre']}}</td>
                            <td>{{$profe['horas_asignadas']}}</td>
                            <td>{{$profe['dias_eco_corre']}}</td>
                            <td>{{$profe['nombre_usuario']}}</td>
                            <td>{{$profe['nombre_puesto']}}</td>
                            <td>{{$profe->divsion->nombre}}</td>


                            <td>
                                <a href="{{route('profesor.nuevo',['id'=>$profe['id']])}}" class="btn btn-success">
                                    <span class="far fa-edit">Editar</span>
                                </a>
                            </td>
                
                            <td>
                                <form action="{{route('profesor.eliminar',['id'=>$profe['id']])}}" name="id" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
@section('js')
<script>
    $('#table-data').DataTable({
        "scrollx":true
    });
</script>
