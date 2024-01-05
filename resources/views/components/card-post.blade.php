
@props(['post'])
<article class="mb-10 bg-white shadow-lg rounded-lg overflow-hidden">
            <a href="{{ route('posts.show',$post)}}"><img class="w-full h-80 object-cover object-center" src=  "@if($post->image) 
                    {{ Storage::url($post->image->url)}} 
                    @else https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1  
                    @endif "
                    alt="{{ $post->name}}"></a>
            <div class="px-6 py-4">
                <a href="{{ route('posts.show',$post)}}">
                    <h1 class="font-bold text-xl mb-2">{{$post->name}}</h1>
                </a>
                <div class="text-gray-700 text-base">  {!! $post->extract !!} </div>
            </div>
            <div class="px-6 pt-4 pb-2 mb-6">
                @foreach ($post->tags as $tag)
                <a href="{{ route('posts.tag',$tag)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1">{{ $tag->name }}</a>

                @endforeach

            </div>
</article>