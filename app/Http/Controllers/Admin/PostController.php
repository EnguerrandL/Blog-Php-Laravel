<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;




use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Mail\ContactReceived;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
// Importation des sessions

use Illuminate\Support\Facades\Session;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->paginate(5);
        return view('admin.posts.index', [
           'posts' => $posts,
           ]);

    }


    public function create()
    {
        $categorie = Category::all();
        return view('admin.posts.create', ['categorie' => $categorie]);
    }


    public function store(PostRequest $request)
    {
        dump($request);

        $postData = $request->validated();
        dump($postData);

        $post = new Post;
        $post->title = $postData['title'];
        $post->content = $postData['content'];
        $post->category_id = $postData['category_id'];
        $post->theme = $postData['theme'];


        if(isset($postData['draft'])) {
            $post->draft = true;
        } else {
            $post->draft = false;
        }

        if(isset($postData['active'])) {
            $post->active = true;
        } else {
            $post->active = false;
        }




        $post->save();
        return redirect()->route('posts.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', [
            'categories' => $categories,
            'post' => $post
        ]);
    }


    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $postData = $request->validated();
        $post->title = $postData['title'];
        $post->content = $postData['content'];
        $post->category_id = $postData['category_id'];
        $post->theme = $postData['theme'];


        if(isset($postData['draft'])) {
            $post->draft = true;
        } else {
            $post->draft = false;
        }

        if(isset($postData['active'])) {
            $post->active = true;
        } else {
            $post->active = false;
        }

        $post->save();
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
