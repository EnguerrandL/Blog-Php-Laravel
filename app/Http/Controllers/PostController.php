<?php

namespace App\Http\Controllers;

use App\Post; 
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }


    public function articles()
     {
         $posts = Post::all(); 

         return view('articles', [
            'posts' => $posts,
            ]);
     }

    
    public function article($id)
    {
        /*$post = new Post;
        $post->title = "le titre";
        $post->content = "Le contenu";
        $post->save();*/

        $post = Post::find($id);

        // dump($post->id);
        // dump($post->content);
        // dump($post->title);

        return view('article', [
        'post' => $post,
       
        
        
        ]);
    }
}
