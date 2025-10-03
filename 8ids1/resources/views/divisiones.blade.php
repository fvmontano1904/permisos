
    @extends('adminlte::page')
    @section('content')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Divisiones</h3>
            </div>
            <div class="box-body">
                <table id="table-data" class="table table-info table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($divisiones as $division)
                        <tr>
                            <td>{{$division['codigo']}}</td>
                            <td>{{$division['nombre']}}</td>
                            <td>
                                <a href="{{route('division.nueva',['id'=>$division['id']])}}" class="btn btn-success">
                                    <span class="far fa-edit">Editar</span>
                                </a>
                            </td>
                
                            <td>
                                <form action="{{route('division.eliminar',['id'=>$division['id']])}}" name="id" method="POST">
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
