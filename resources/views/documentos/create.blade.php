<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Inncloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

                @if ($errors->any())
                         <div class="alert alert-dark alert-dimissible fade show" role="alert">
                        <span>
                            @foreach ($errors->all() as $error)
                                <li class="badge badge-danger">{{ $error }}</li>
                            @endforeach

                            <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </span>
                    </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        <button type="button" class="close" data-dismiss="alert"></button>
                        {{ session()->get('message') }}
                    </div>
                @endif

            <div class="card col-md-10 m-auto shadow-lg">
            {!! Form::open(array('route' => 'documentos.store','method'=>'POST')) !!}
            
            <div class="form-group row m-auto">
                <label for="nombre" class="col-md-3 col-form-label text-md-right">{{ __('Nombre del documento:') }}</label>

                <div class="col-md-7">
                    {!! Form::text('nombre',null,array(
                        'class'=>'form-control',
                        'required'=>'required',
                        'placeholder'=>'Nombre'
                    )) !!}
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row m-auto">
                <label for="contenido" class="col-md-3 col-form-label text-md-right">{{ __('Contenido:') }}</label>

                <div class="col-md-7">
                    {!! Form::textarea('contenido',null,array(
                        'class'=>'form-control',
                        'required'=>'required',
                        'placeholder'=>'Contenido'
                    )) !!}
                    @error('contenido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                <div class="form-group row m-auto">
                <label for="proceso_id" class="col-md-3 col-form-label text-md-right">{{ __('Proceso:') }}</label>
                    <div class="col-md-7">
                          {!! Form::select('proceso_id', $procesos,null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                
                <div class="form-group row m-auto">
                    <label for="tipo_documento_id" class="col-md-3 col-form-label text-md-right">{{ __('Tipo de documento:') }}</label>
                        <div class="col-md-7">
                          {!! Form::select('tipo_documento_id', $tiposDocumentos,null, ['class' => 'form-control']) !!}
                        </div>
                </div>
                <div class="form-group row m-auto">
                    
                        <a href="/documentos" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    
                </div>
              {!! Form::close() !!}    
            </div>
        </div>      
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
    <script>

     </script>
  </body>
</html>