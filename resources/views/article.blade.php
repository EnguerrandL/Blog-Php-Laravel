@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>


                <div class="card-body">


                    {{ $post->content }}

                </div>
                <a href="{{route('articles')}}"><button type="button" class="mx-auto btn btn-primary">Revenir aux articles</button></a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des commentaires</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($post->comments as $comment)


                    <b>
                        {{ $comment->user->name }}
                    </b>
                    <hr>

                    <p>
                        {{ $comment->content }}
                    </p>
                    <small>{{ $comment->updated_at->diffForHumans() }}</small>
                    <hr>
                    <br>


                    @endforeach

                  <!-- Formulaire -->
                  @guest
                      Vous devez être connecté
                  @else
                  <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12 mb-3">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="col-md-12 mb-3">
                        <label for="content">Comment</label><br>
                        <textarea placeholder="Commentaire..." name="content" id="content" style="width:100%" rows="5">
                            {{ old('content') }}
                        </textarea>
                    </div>

                    </div>
                    <br>
                    <input class="btn-block btn-primary btn" type="submit" value="Envoyer">
                </form>
                @endguest

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
