
@extends('adminlte::page')
    @section('content')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Puestos</h3>
            </div>
            <div class="box-body">
                <table id="table-data"  class="table table-info table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($puesto_var as $puest)
                        <tr>
                            <td>{{$puest['codigo']}}</td>
                            <td>{{$puest['nombre']}}</td>
                            <td>
                                <a href="{{route('puesto.nuevo',['id'=>$puest['id']])}}" class="btn btn-success">
                                    <span class="far fa-edit">Editar</span>
                                </a>
                            </td>
                
                            <td>
                                <form action="{{route('puesto.eliminar',['id'=>$puest['id']])}}" name="id" method="POST">
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
