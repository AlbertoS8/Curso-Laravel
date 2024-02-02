@extends('web.layout')

@section('content')
    <x-web.blog.post.index :posts="$posts">
        <h1>Listado principal del post</h1>

        @slot('header')
            <h1>Listado principal del post   -- slot con nombre</h1>
        @endslot

        @slot('footer')
            <footer>
                Pie de pagina
            </footer>
        @endslot

        @slot('extra','Extra')
    </x-web.blog.post.index>   

@endsection