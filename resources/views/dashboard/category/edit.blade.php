@extends('dashboard.layout')

@section('content')
    <h1>Actualizar Category: {{ $category->title }}</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @method("PATCH")
        
        @include('dashboard.category._form')

    </form>
@endsection
