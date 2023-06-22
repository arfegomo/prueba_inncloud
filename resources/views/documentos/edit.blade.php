@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar documento</h1>
@stop

@section('content')
<div class="card col-md-12 m-auto shadow-lg">

    {!! Form::model($documento, ['route' => ['documentos.update', $documento->id],'method'=>'PUT']) !!}
    
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
        <label for="nombre" class="col-md-3 col-form-label text-md-right">{{ __('Código:') }}</label>

        <div class="col-md-9">
            {!! Form::text('codigo',null,array(
                'class'=>'form-control',
                'required'=>'required',
                'placeholder'=>'Código',
                'readonly' => 'readonly'
            )) !!}
            @error('codigo')
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop