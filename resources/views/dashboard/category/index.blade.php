@extends('dashboard.layout')

@section('content')
    <a class="btn btn-success mb-4" href="{{ route("category.create" )}}">Crear</a>
    <table class="table">
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
                        <a class="btn btn-primary mb-1" href="{{ route("category.show",$c)}}">Consultar</a>
                        <a class="btn btn-warning mb-1" href="{{ route("category.edit",$c)}}">Editar</a>
                        <form action="{{ route("category.destroy",$c)}}" method="post">
                        @method("DELETE")
                        @csrf
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection