@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRUD Documentos</h1>
@stop

@section('content')

<div class="float-right">
    <a href="{{ route('documentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
    <i class="fa-solid fa-file-circle-plus"></i> {{ __('Crear Documento') }}
    </a>
</div>

<table id="tablaDocumentos" class="display responsive nowrap" style="width: 100%;">
    <thead class="bg-dark text-white">
        <tr>
            <th>ACCIONES</th>
            <th>NOMBRE</th>
            <th>CODIGO</th>
            <th>CONTENIDO</th>
            <th>TIPO DE DOCUMENTO</th>
            <th>PROCESO</th>
            
            
        </tr>
    </thead>
    <tbody>
        @if($documentos->count() > 0)
            @foreach ($documentos as $documento)
                <tr>
                    <td>
                    <form action="{{ route('documentos.destroy',$documento->id) }}" class="formulario-eliminar" method="POST">
                        <a class="btn btn-sm btn-success" href="{{ route('documentos.edit',$documento->id) }}"><i class="fa-solid fa-file-pen"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                    </form>
                    </td>
                    <!--<td>{{ $documento->id }}</td>-->
                    <td>{{ $documento->nombre }}</td>
                    <td>{{ $documento->procesos->prefijo }}-{{ $documento->tipoDocumentos->prefijo }}-{{ $documento->codigo }}</td>
                    <td>{{ $documento->contenido }}</td>
                    <td>{{ $documento->tipoDocumentos->nombre }}</td>
                    <td>{{ $documento->procesos->nombre }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>                        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready( function () {
$('#tablaDocumentos').DataTable({
    responsive:true,
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
}
},
});
});

</script>

@if(session('eliminado') == "ok")
    <script>
        Swal.fire('Registro eliminado!', '', 'success')
    </script>
@endif

<script>
$('.formulario-eliminar').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Está seguro?',
    text: '¡Este registro se eliminará definitivamente!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirmar',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
        this.submit();
    } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
    }
    })
});
</script>
@stop