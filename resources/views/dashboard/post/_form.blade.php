@csrf
<label for="">Titulo</label>
        <br> 
        <input type="text" name="title" value="{{ old("title", $post->title) }}">
        <br><br>     
        <label for="">Slug</label>
        <br> 
        <input type="text" name="slug" value="{{ old("slug", $post->slug) }}">
        <br>
        <br><br>
        <label type="">Categoria</label>
        <select name="category_id">
            <option value=""></option>
            @foreach ($categories as $title => $id)
                <option {{ old("category_id", $post->category_id) == $id ? "selected " : ""}} value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>
        <br>
        <label for="">Publicado</label>
        <select name="posted" id="">
            <option value=""></option>
            <option {{ old("posted",$post->posted) == 'yes' ? 'selected':''}} value="yes" >Si</option>
            <option {{ old("posted",$post->posted) == 'not' ? 'selected':''}} value="not" >No</option>
        </select>
        <br><br>

        <label for="">Contenido</label>
        <br> 
        <input type="text" name="content" value="{{ old("content",$post->content) }}">
        <br><br>
        <label for="">Descripcion</label>
        <br> 
        <input type="text" name="description" value="{{ old("description",$post->description) }}">
        <br><br> 
        @if (isset($task) && $task == "edit")
            
        
            <label for="">Imagen</label>
            <br>
            <input type="file" name="image">
            <br><br>
        @endif
        
        <button type="submit">Enviar</button>