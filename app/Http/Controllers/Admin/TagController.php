<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(20);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors =[
            'purple' => 'Morado',
            'green'  => 'Verde',
            'red'    => 'Rojo',
            'pink'   => 'Rosa',
            'indigo' => 'Indigo'
        ];
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validaciones--
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        // return $request->all();

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('info', 'El tag se creo correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {

        $colors =[
            'purple' => 'Morado',
            'green'  => 'Verde',
            'red'    => 'Rojo',
            'pink'   => 'Rosa',
            'indigo' => 'Indigo'
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //Validaciones--
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        //return $request->all();

        $tag->update($request->all());
        return redirect()->route('admin.tags.index')->with('info', 'El tag se actualizó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'El tag se eliminó correctamente!');
    }
}
