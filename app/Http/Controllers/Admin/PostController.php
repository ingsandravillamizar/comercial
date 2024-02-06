<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::paginate(5);
        return view('admin.posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::pluck('name','id');  //permite determinar que elementos quiero recibir  necesitamos el id y el nombre para llenar el combo
        return view('admin.posts.create', compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
    

        // return $request->all();
        //return $request;
        //return $request->file('file');  //obtenemos la ubicacion : la copia del archivo que se hacen en temporal
        

        $post = Post::create($request->all());

        //imagenes
        if($request->file('file')){
            $url = Storage::put('posts',  $request->file('file'));  //guarda en la carpeta publica 
            $post->image()->create([
                'url'=> $url
            ]);
        }

        //taggeable
        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        
        return redirect()->route('admin.posts.index')->with('info', 'El Post se creo correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view ('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::pluck('name','id');
        return view('admin.posts.edit', compact('post','tags','categories'));
    }


    
    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post){

        $post->update($request->all());

        //imagenes
        if($request->file('file')){
            $url = Storage::put('posts',  $request->file('file'));  //guarda en la carpeta publica 
            if($post->image){
                Storage::delete($post->image->url);
                $post->image()->update([
                    'url'=> $url
                ]);
            }else{
                $post->image()->create([
                    'url'=> $url
                ]);
            }
        }

        //taggeable
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('admin.posts.index')->with('info', 'El post se actualizó correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        Storage::delete($post->image->url);
        $post->image()->delete();  //Elimina registro de la tabla de imagenes
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info', 'El Post se eliminó correctamente!');
    }
}
