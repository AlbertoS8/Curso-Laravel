@extends('dashboard.layout')

@section('content')
    <a href="{{ route("post.create" )}}">Crear</a><br><br>
    <table>
        <thead>
            <tr>
                <th>
                    Titulo &emsp;&emsp;&emsp;
                </th>
                <th>
                    Categoria &emsp;&emsp;&emsp;
                </th>
                <th>
                    Posted &emsp;&emsp;&emsp;
                </th>
                <th>
                    Acciones &emsp;&emsp;&emsp;
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
                        <a href="{{ route("post.show",$p)}}">Consultar</a>
                        <a href="{{ route("post.edit",$p)}}">Editar</a>
                        <form action="{{ route("post.destroy",$p)}}" method="post">
                        @method("DELETE")
                        @csrf
                            <button type="submit">Eliminar</button>
                        
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection