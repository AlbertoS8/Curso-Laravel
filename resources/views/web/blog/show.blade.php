@extends('web.layout')

@section('content')
    <x-alert class="mb-4" type='error' :message="$post->title" data_id='1' data-priority='medium' />
    <x-web.blog.post.show :post="$post" class="bg-blue-900" data-attr="data2" /> 
    <h3>Dinamico</h3>
    <x-dynamic-component component='alert' type='error' :message="$post->title" data_id='1' data-priority='medium' />
    <x-dynamic-component component='web.blog.post.show' :post="$post" class="bg-blue-900" data-attr="data2" />
@endsection