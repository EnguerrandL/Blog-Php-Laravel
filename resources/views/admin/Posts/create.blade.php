@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header">Création d'un article</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form class="text-center" action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <label for="">Titre</label>
                    <input type="text" name="title">
                    <label for="">Contenu</label>
                    <input type="text" name="content">
                    <br>


                    <input type="checkbox" name="draft"> Cocher si c'est un brouillon
                    <input type="checkbox" name="active"> Cocher si visible sur le site

                    <br>
                    <select name="theme">
                    <option value="Symfony">Symfony</option>
                    <option value="Laravel">Laravel</option>
                    <option value="Wordpress">Wordpress</option>
                    </select>

                    <br>
                    <select name="category_id">
                    @foreach($categorie as $category)
                    <option value="{{$category->id}}">{{$category->title}}
                    </option>
                    @endforeach
                    </select>

                    <br>
                    <input type="submit" value="envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
