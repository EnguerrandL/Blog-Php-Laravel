@extends('layouts.app')

@section('content')
<div class=" mt-5 container col-md-10">
@if (session('status'))
                        <div class="alert alert-{{ session('type') }}" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="text-center">
          <a class="mb-2 btn btn-primary m-2" href="{{ route('posts.create') }}">
          Créer un article
          </a>
          <hr>
          {{ $posts->links() }}
          <hr>
</div>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <td>TITRE</td>
                        <td>Catégorie</td>
                        <td>Date de Création</td>
                        <td>Dernière Modification</td>
                        <td class="text-center">ACTIONS</td>
                    </tr>
                </thead>
                @foreach($posts as $post)
                    <tr>
                    <td>{{ $post->title }}</td>



                    <td>

                       @if ($post->category)
                       {{ $post->category->title }}
                        @endif
                    </td>


                    <td>{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>

                                  <td class="text-right">     <a class="mb-2 btn btn-secondary m-2 p-1 text-right" href="{{ route('posts.edit', ['id'=>$post->id]) }}">
                                   Modifier l'article
                                  </a>


                                  <form action="{{ route('posts.destroy',  ['id'=>$post->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="mb-2 btn btn-danger  m-2 p-1 " type="submit">Supprimer l'article</button>
                                </form>


                                </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection
