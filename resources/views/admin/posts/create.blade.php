@extends('adminlte::page')

@section('title', 'Blog|Posts')

@section('content_header')
<h1>Nuevo Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
                {!! Form::open(['route'=>'admin.posts.store','method'=> 'post', 'files'=>true]) !!}

                @include('admin.posts.partials.form')


                {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm']) !!}
                {!! Form::close() !!}

        </div>

    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .preview{
        position: relative;
        padding-bottom: 50%;
    }
    .preview img {
        position:absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('vendor/stringtoslug.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    
    
    
    stringToSlug('name', 'slug');

    //Mostrar imagen previa
    document.getElementById("file").addEventListener('change', changeImage);

    function changeImage(event){
        let file = event.target.files[0]  //obtiene la imagen en base 64
        let reader = new FileReader();    //Crea una nueva instancia
        reader.onload = (event)=>{
            document.getElementById("photo").setAttribute('src', event.target.result)
        }
        reader.readAsDataURL(file);

    }


    </script>



@stop