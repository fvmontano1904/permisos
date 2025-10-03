@extends('adminlte::page')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Permisos aprobados</h3>
        </div>
        <div class="box-body">
            <table id="table-data" class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Permiso</th>
                        <th>Fecha</th>
                        <th>Motivo</th>
                        <th>Profesor</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permisos as $permiso)
                    <tr>
                        <td>{{$permiso['id']}}</td>
                        <td>{{$permiso['fecha']}}</td>
                        <td>{{$permiso['motivo']}}</td>
                        <td>{{$permiso['nombre_profesor']}}</td>
                        <td>{{$permiso['estado']}}</td>
                        <td>{{$permiso['observaciones']}}</td>
                        
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
    function mostrarFormularioA() {
        document.getElementById('formAprobar').style.display = 'block';
    }
    function mostrarFormularioR() {
        document.getElementById('formRechazar').style.display = 'block';
    }
</script>
