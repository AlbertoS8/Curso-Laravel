@extends('dashboard.layout')

@section('content')
    <a class="btn btn-success mb-4" href="{{ route("post.create" )}}">Crear</a>
    <table class="table">
        <thead>
            <tr>
                <th>
                    Titulo
                </th>
                <th>
                    Categoria
                </th>
                <th>
                    Posted
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>
                        {{ $p->title }}
                    </td>
                    <td>
                        {{ $p->category->title }}
                    </td>
                    <td>
                        {{ $p->posted }}
                    </td>
                    <td>
                        <a class=" my-1 btn btn-primary" href="{{ route("post.show",$p)}}">Consultar</a>
                        <a class=" my-1 btn btn-warning" href="{{ route("post.edit",$p)}}">Editar</a>
                        <form action="{{ route("post.destroy",$p)}}" method="post">
                        @method("DELETE")
                        @csrf
                            <button class=" my-1 btn btn-danger" type="submit">Eliminar</button>
                        
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection