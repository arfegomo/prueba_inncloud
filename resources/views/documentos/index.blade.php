<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Inncloud</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
    <div class="container">
        <div class="row align-items-md-stretch">
            <div class="col-md-12">
                <div class="h-100 p-4 text-white bg-dark rounded-3 text-center">
                    <h3>CRUD Inncloud</h3>
                    <img src="{{ asset('/img/logomark.min.svg') }}" width="100" height="100">
                </div>
            </div>
            
            <div class="float-right">
              <a href="{{ route('documentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                {{ __('Crear Documento') }}
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
                                <form action="{{ route('documentos.destroy',$documento->id) }}" method="POST">
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
        </div>      
        <hr>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
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
  </body>
</html>