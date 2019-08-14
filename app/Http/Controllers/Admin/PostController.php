<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Post;


// Importation des sessions

use Illuminate\Support\Facades\Session;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::all(); 

        return view('admin.posts.index', [
           'posts' => $posts,
           ]);
    }

 
    public function create()
    {
        return view('admin.posts.create');
    }

 
    public function store(Request $request)
    {
        dump($request);

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('articles');
    }


    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $post = Post::find($id); 
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

 
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        $request->session()->flash('status', 'Article bien modifié');
        $request->session()->flash('type', 'success');
        
        return redirect()->route('posts.index');
    }

   
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();


        // Session importer

        Session::flash('status', 'Article bien supprimé');
        Session::flash('type', 'danger');
        return redirect()->route('posts.index');
    }
}
