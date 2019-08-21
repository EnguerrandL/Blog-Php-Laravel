<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Pour utiliser Session::flash

class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {


        $data = $request->validated();

        $comment = new Comment;
        $comment->content = $data['content'];
        $comment->post_id = $data['post_id'];
        $comment->user_id = auth()->user()->id;
        $comment->save();

        $request->session()->flash('status', 'Votre commentaire a bien été pris en compte');

        return back();

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
