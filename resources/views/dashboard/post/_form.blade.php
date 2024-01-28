@csrf
<label for="" class="">Titulo</label>
<br>
<input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
<br>
<label for="">Slug</label>
<br>
<input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
<br>
<label type="">Categoria</label>
<select name="category_id" class="form-control">
    <option value=""></option>
    @foreach ($categories as $title => $id)
        <option {{ old('category_id', $post->category_id) == $id ? 'selected ' : '' }} value="{{ $id }}">
            {{ $title }}</option>
    @endforeach
</select>
<br>
<label for="">Publicado</label>
<select name="posted" id="" class="form-control">
    <option value=""></option>
    <option {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }} value="yes">Si</option>
    <option {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }} value="not">No</option>
</select>
<br>

<label for="">Contenido</label>
<br>
<input type="text" class="form-control" name="content" value="{{ old('content', $post->content) }}">
<br>
<label for="">Descripcion</label>
<br>
<input type="text" class="form-control" name="description" value="{{ old('description', $post->description) }}">
<br>
@if (isset($task) && $task == 'edit')
    <label for="">Imagen</label>
    <br>
    <input type="file" name="image">
    <br>
@endif

<button class="btn btn-primary" type="submit">Enviar</button>
