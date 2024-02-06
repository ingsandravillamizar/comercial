@extends('adminlte::page')

@section('title', 'Blog|Tags')

@section('content_header')
<h1>Listado de Tags</h1>
@stop

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<div class="card">
    <div class="card-header">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.create') }}">Nuevo</a>
    </div>
    <div class="card-body">
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th colspan="2"> </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td> {{ $tag->id}}</td>
                    <td> {{ $tag->name}}</td>
                    <td> {{ $tag->color}}</td>
                    <td width="10px">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                    </td>
                    <td width="10px" >
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td colspan="4"> {{ $tags->links() }}</td>
            </tfoot>

        </table>

    </div>
</div>


 
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop