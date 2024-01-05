<x-app-layout>
    <div class="container py-8">

        <div class="grid grid-cols-3">
            <aside class="list-none">
                <h2 class="text-2xl font-bold text-gray-600 mb-4">Categoria: {{ $post->category->name}}</h2>
                @foreach ($relacionados as  $item)
                    <li class="mb-4">
                        <a href= "{{ route('posts.show', $item) }}" >
                            <img class= "w-44 h-30 object-cover object-center"  
                            src=  "@if($item->image)  
                            {{ Storage::url($item->image->url)}}  
                            @else https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1  
                            @endif "
                            alt="{{ $item->name}}">
                    
                            <span >{{ $item->name }}</span>
                        
                        </a>
                        
                    </li>
                @endforeach
            </aside>
            <div class="col-span-2">
                <h1 class="text-4xl font-blond text-gray-600">{{ $post->name }}</h1>
                <div class="text-lg text-gray-500 mb-2">
                    {!! $post->extract !!}
                </div>
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="@if($post->image) 
                    {{ Storage::url($post->image->url)}} 
                    @else https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1  
                    @endif "
                    alt="{{ $post->name}}">
                </figure>
                <div class="text-base text-gray-500 mt-4 ">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
</x-app-layout>