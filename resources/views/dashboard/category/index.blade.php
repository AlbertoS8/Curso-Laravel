@extends('dashboard.layout')

@section('content')
    <a href="{{ route("category.create" )}}">Crear</a><br><br>
    <table>
        <thead>
            <tr>
                <th>
                    Titulo &emsp;&emsp;&emsp;
                </th>
                <th>
                    Acciones &emsp;&emsp;&emsp;
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>
                        {{ $c->title }}
                    </td>
                    <td>
                        <a href="{{ route("category.show",$c)}}">Consultar</a>
                        <a href="{{ route("category.edit",$c)}}">Editar</a>
                        <form action="{{ route("category.destroy",$c)}}" method="post">
                        @method("DELETE")
                        @csrf
                            <button type="submit">Eliminar</button>
                        
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection