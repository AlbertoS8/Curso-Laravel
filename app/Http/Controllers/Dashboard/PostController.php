<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Termwind\Components\Dd;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
       /@return \Illuminate\Http\Response 
     */
   
    public function index()
    {
        $posts = Post::paginate(2);
        return view("dashboard.post.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $posts = Post::get();
        // dd($posts);
        $categories = Category::pluck('id','title');
        $post = new Post();
        echo view("dashboard.post.create",compact('categories','post'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //echo dd(request('title')); --Obtener uno de los datos que se enviaron
        //--Obtener todos los datos que se enviaron

        //$validated = $request->validate(StoreRequest::myRules());
        
        //$validated = Validator::make($request->all(),StoreRequest::myRules());
        //dd($validated->fails()); -- Sirve para visualizar si hay fallos con las validaciones true si hay, y false si no hay
        //dd($validated->errors()); -- Nos muestra los errores tiene el texto que escribimos en los campos

        //$data = array_merge($request->all(),['image'=>'']);
        // $data = $request->validated();
        // $data['slug'] = Str::slug($data['title']);
        // dd($data);
        // Post::create($data);
        
        Post::create($request->validated());

        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view("dashboard.post.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::pluck('id','title');
        echo view("dashboard.post.edit",compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data["image"])){

            $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image"), $filename);
        }
        
        $post->update($data);
        
        //$request->session()->flash('status',"Registro Actualizado!");
        return to_route('post.index')->with('status',"Registro Actualizado!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        echo "destroy";
        return to_route('post.index');
    }
}
