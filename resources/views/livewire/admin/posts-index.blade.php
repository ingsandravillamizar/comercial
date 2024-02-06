<div>
    <div class="card">
        <div class="card-header">
            <input wire:model.live ="search" type="text" class="form-control" placeholder="Ingrese el nombre del post">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td>{{ $post->name}}</td>
                        <td>
                            <a href=""></a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-info btn-sm" href="{{ route('admin.posts.edit', $post) }}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td width="10px" >
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    </div>
</div>
