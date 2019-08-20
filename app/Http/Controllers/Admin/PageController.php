<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\PageRequest;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{


    public function index()
    {
        $page = Page::paginate(5);


        return view('admin.pages.index', [
           'pages' => $page,
           ]);

    }


    public function create()
    {

        return view('admin.pages.create');
    }


    public function store(PageRequest $request)
    {

        $data = $request->validated();
        $page = new Page;
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->content = $data['content'];


        if(isset($data['draft'])) {
            $page->draft = true;
        } else {
            $page->draft = false;
        }

        if(isset($data['active'])) {
            $page->active = true;
        } else {
            $page->active = false;
        }


        $page->save();
        return redirect()->route('pages.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $page = Page::find($id);

        return view('admin.page.sedit', [
            'page' => $page,

        ]);
    }


    public function update(PostRequest $request, $id)
    {
        $data = Post::find($id);
        $page = new Page;
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->content = $data['content'];


        if(isset($data['draft'])) {
            $page->draft = true;
        } else {
            $page->draft = false;
        }

        if(isset($data['active'])) {
            $page->active = true;
        } else {
            $page->active = false;
        }


        $page->save();

        $request->session()->flash('status', 'Article bien modifié');

        return redirect()->route('pages.index');
    }


    public function destroy($id)
    {
        $page = Post::find($id);
        $page->delete();


        // Session importer

        Session::flash('status', 'Article bien supprimé');
        Session::flash('type', 'danger');
        return redirect()->route('pages.index');
    }
}
