@extends('adminlte::page')

@section('title', 'Blog|Tags')

@section('content_header')
<h1>Edición</h1>
@stop

@section('content')
{!! Form::model( $tag,['route'=>['admin.tags.update',$tag], 'method'=> 'put']) !!}
{!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) !!}
    @include('admin.tags.partials.form')
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