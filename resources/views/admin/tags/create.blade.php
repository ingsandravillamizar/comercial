@extends('adminlte::page')

@section('title', 'Blog|Tags')

@section('content_header')
<h1>Nuevo Tag</h1>
@stop

@section('content')
{!! Form::open(['route'=>'admin.tags.store','method'=> 'post']) !!}
    @include('admin.tags.partials.form')
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