@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')
<a href="articulos/create" class="btn btn-primary mb-3">CREAR</a>

<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%"    >
<thead class="bg-primary text-white">
    <tr>
        <th scope="col">id</th>
        <th scope="col">Codigos</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
    </tr>
</thead>
<tbody>
    @foreach ($articulos as $articulo)
    <tr>
        <td>{{ $articulo->id}}</td>
        <td>{{$articulo->codigo}}</td>
        <td>{{$articulo->descripcion}}</td>
        <td>{{$articulo->cantidad}}</td>
        <td>{{$articulo->precio}}</td>
        <td>
            <form action="{{route ('articulos.destroy',$articulo->id)}}" method="POST">
            <a href="/articulos/{{ $articulo->id}}/edit" class="btn btn-info">EDITAR</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">BORRAR</button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@stop

@section('css')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#articulos').DataTable({
            "lengthMenu": [[5, 10, 50 -1], [5, 10, 50,"All"]]
        });

}   );
</script>
@stop