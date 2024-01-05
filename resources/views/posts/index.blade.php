<x-app-layout>
<div class="container py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
        
            <article class="relative w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" 
            style="background-image:url(@if($post->image) {{ Storage::url($post->image->url)}} @else https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1  @endif )"> 
               
                <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-between px-8">
                    <a href="{{ route('posts.show', $post) }}">
                        <h1 class="text-2xl text-white leading-8 font-bold">{{ $post->name }}</h1>
                    </a>
                    <div class="mt-2 flex justify-center flex-wrap">
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 h-6 bg-{{ str_replace(' ', '', $tag->color) }}-600 text-white rounded-sm mb-2 mr-2">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</div>



    <div class="container py-8">
        <div class="grid grid-cols-3 gap-6">
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>