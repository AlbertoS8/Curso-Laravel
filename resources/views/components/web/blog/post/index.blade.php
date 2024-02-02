{{ $slot }}

{{ $header }}

@foreach ($posts as $p)
    <div class="card bg-gray-700 mb-1">
        <h3> {{ $p->title }} </h3>
        <a href=" {{ route('web.blog.show', $p) }} ">Ir</a>
        <p> {{ $p->description }} </p>
    </div>
    
@endforeach

{{ $extra }}

{{ $posts->links() }}

{{ $footer }}