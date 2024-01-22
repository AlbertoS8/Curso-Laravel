@csrf

<label for="">Titulo</label>
<br> 
<input type="text" name="title" value="{{ old("title", $category->title) }}">
<br><br>     
<label for="">Slug</label>
<br> 
<input type="text" name="slug" value="{{ old("slug", $category->slug) }}">
<br>
<br><br>
<button type="submit">Enviar</button>    