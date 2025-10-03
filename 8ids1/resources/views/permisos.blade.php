@extends('adminlte::page')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Solicitud de permisos</h3>
        </div>
        <div class="box-body">
            <table id="table-data" class="table table-border">
                <thead>
                    <tr>
                        <th>Permiso</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Motivo</th>
                        <th>Profesor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permisos as $permiso)
                    <tr>
                        <td>{{$permiso['id']}}</td>
                        <td>{{$permiso['fecha']}}</td>
                        <td>{{$permiso['estado']}}</td>
                        <td>{{$permiso['motivo']}}</td>
                        <td>{{$permiso['nombre_profesor']}}</td>
                        <td>
                            <button class="btn btn-success" onclick="mostrarFormularioA()">Aprobar</button>
                            <form id="formAprobar" action="{{ route('permiso.aprobar', ['id' => $permiso->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <input type="text" class="form-control" id="observaciones" name="observaciones">
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-danger" onclick="mostrarFormularioR()">Rechazar</button>
                            <form id="formRechazar" action="{{ route('permiso.rechazar', ['id' => $permiso->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="observaciones">Observaciones:</label>
                                    <input type="text" class="form-control" id="observaciones" name="observaciones">
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar</button>
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
    function mostrarFormularioA() {
        document.getElementById('formAprobar').style.display = 'block';
    }
    function mostrarFormularioR() {
        document.getElementById('formRechazar').style.display = 'block';
    }
</script>
