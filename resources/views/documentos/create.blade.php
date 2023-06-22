@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear documento</h1>
@stop

@section('content')
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

<div class="card col-md-12 m-auto shadow-lg">
{!! Form::open(array('route' => 'documentos.store','method'=>'POST')) !!}

<div class="form-group row m-auto">
<label for="nombre" class="col-md-3 col-form-label text-md-right">{{ __('Nombre del documento:') }}</label>

<div class="col-md-9">
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

<div class="col-md-9">
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
<div class="col-md-9">
 {!! Form::select('proceso_id', $procesos,null, ['class' => 'form-control']) !!}
</div>
</div>

<div class="form-group row m-auto">
<label for="tipo_documento_id" class="col-md-3 col-form-label text-md-right">{{ __('Tipo de documento:') }}</label>
<div class="col-md-9">
 {!! Form::select('tipo_documento_id', $tiposDocumentos,null, ['class' => 'form-control']) !!}
</div>
</div>

<div class="form-group row float-right">
    <div class="col-md-12">
    <a href="/documentos" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-dark">Guardar</button>
    </div>
</div>

{!! Form::close() !!}    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop