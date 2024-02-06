<div>
                        {!! Form::hidden('user_id', auth()->user()->id) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, [
                        'class'=> 'form-control',
                        'placeholder'=> 'Ingrese el nombre del post'])  !!}
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, [
                        'class'=> 'form-control',
                        'readonly',
                        'placeholder'=> 'Aqí irá el slug del post'])  !!}
                            @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Categoria') !!}
                        {!! Form::select('category_id', $categories, null, [
                        'class'=> 'form-control',
                        'placeholder' => 'Seleccione la categoria'
                        ])  !!}
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <p class="font-weight-bold">Etiquetas</p>
                        @foreach($tags as $tag)
                                <label class= "mr-2">
                                    {!! Form::checkbox('tags[]', $tag->id,null) !!}
                                    {{$tag->name}}
                                </label>
                        @endforeach
                            @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                
                <div class="row mb-3">
                    <div class="col">
                    <div class="preview">
                        @isset($post->image)
                        <img id = "photo" src="{{ Storage::url($post->image->url) }} " alt="Imagen">
                        @else
                        <img id = "photo" src="https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1  " alt="Imagen">
                        @endisset
                    </div>
                    </div>
                    <div class ="col">
                        {!! Form::label('file', 'Imagen de Portada')  !!}
                        {!! Form::file('file' , ['class' => 'form-control-file', 'accept' => 'image/*' ] ) !!}
                        <p>Agradecemos tu participación en nuestra plataforma. Para mejorar la calidad y atractivo de tu publicación, 
                        te recomendamos incluir una imagen. Esto no es obligatorio, 
                        pero puede enriquecer significativamente la experiencia de los usuarios al interactuar con tu contenido.</p>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                        {!! Form::label('extract', 'Extracto') !!}
                        {!! Form::textarea('extract', null, [
                        'class'=> 'form-control',
                        'placeholder'=> 'Aquí irá el extracto del post'])  !!}
                            @error('extract')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                </div>    
                <div class="form-group">
                        {!! Form::label('body', 'Cuerpo del post') !!}
                        {!! Form::textarea('body', null, [
                        'class'=> 'form-control',
                        'placeholder'=> 'Aquí irá el cuerpo del post'])  !!}
                            @error('body')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                </div> 

                <div class="form-group">
                        <p class="font-weight-bold">Estado</p>
                        <label class="mr-2">
                            {!! Form::radio('status',1) !!}
                            Borrador
                        </label>
                        <label>
                            {!! Form::radio('status',2) !!}
                            Publicado
                        </label>
                        
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>