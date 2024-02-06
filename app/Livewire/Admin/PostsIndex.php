<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;    //como es un componente de livewire debemos indicarle que usarmeos pagination  no viene por defecto
    protected $paginationTheme = "bootstrap";   //el tema que va a utilizar es el de bosstrap no taiwail
    public    $search;   //se declara publica para usarla en la vista


    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('name', 'LIKE', '%' . $this->search . '%')
        ->where('user_id', auth()->user()->id)
        ->paginate(5);
        return view('livewire.admin.posts-index',  compact('posts'));
    }
}
