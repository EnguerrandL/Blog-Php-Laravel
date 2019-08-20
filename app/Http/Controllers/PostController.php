<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
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


public function category($title)
  {



    $category = Category::where([
        ['title', '=', $title]
    ])->first();
    $categories = Category::all();
    $postsCat = Post::where([
        ['active', '=', true],
        ['draft', '=', false],
        ['category_id', "=", $category->id]

        ])

        ->orderBy('created_at', 'DESC')
        ->paginate(9);

    return view('category', [
        'posts' => $postsCat,
        'categories' => $categories,
        'category_title' => $category->title
    ]);
  }

    public function articles()
     {
         $categories = Category::all();
         $posts = Post::where([
             ['active', '=', true],
             ['draft', "=", false]
             ])
             ->orderBy('created_at', 'DESC')
             ->paginate(9);

         return view('articles', [
            'posts' => $posts,
            'categories' => $categories,
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
