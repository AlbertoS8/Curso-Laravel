
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="error">
            {{ $error }}
        </div>
    @endforeach
    <br>
    @endif