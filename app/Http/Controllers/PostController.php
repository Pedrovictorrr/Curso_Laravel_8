<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

use App\Models\post;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::orderby('id')->paginate(5);
        
        return view("posts.index",compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(StorePostRequest $request)
    {
        post::create($request->all());
        return redirect()->route('index.post')->with('message','Post criado com sucesso');
        
    }


    public function show($id)
    {   
        if(!$post = post::find($id)){
            return redirect()->route('index.post');
        }
        return view('posts.show',compact('post'));
    }


    public function destroy($id)
    {
        if(!$post = Post::find($id))
            return redirect()->route('index.post');
        
        $post->delete();

        return redirect()->route('index.post')->with('message','Post deletado com sucesso');

    }

    public function edit($id)
    {   
        if(!$post = post::find($id)){
            return redirect()->back();
        }
        return view('posts.edit',compact('post'));
    }

    public function update(StorePostRequest $request, $id)
    {   
        if(!$post = post::find($id)){
            return redirect()->back();
        }
         $post->update($request->all());

         return redirect()->route('index.post')->with('message','Post atualizado com sucesso');
    }
    public function search(Request $request)
    {   
        $filters = $request->except('_token');
        $posts = post::where('title','LIKE',"%{$request->search}%")->orWhere('content','LIKE',"%{$request->search}%")->paginate();

        return view("posts.index",compact('posts','filters'));
    }
}
