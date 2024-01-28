@csrf

<label for="">Titulo</label>
<br> 
<input type="text" class="form-control" name="title" value="{{ old("title", $category->title) }}">
<br>
<label for="">Slug</label>
<br> 
<input type="text" class="form-control" name="slug" value="{{ old("slug", $category->slug) }}">
<br>
<button type="submit" class="btn btn-primary">Enviar</button>    