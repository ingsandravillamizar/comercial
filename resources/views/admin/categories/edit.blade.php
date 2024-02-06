@extends('adminlte::page')

@section('title', 'Blog|Categorias')

@section('content_header')
<h1>Edición</h1>
@stop

@section('content')
        {!! Form::model( $category,['route'=>['admin.categories.update',$category], 'method'=> 'put']) !!}
            @include('admin.categories.partials.form')
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) !!}
{!! Form::close() !!}
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('vendor/stringtoslug.js') }}"></script>
<script>
    stringToSlug('name', 'slug');
</script>
@stop