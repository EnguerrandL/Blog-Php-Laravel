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
          <a class="mb-2 btn btn-primary m-2" href="{{ route('pages.create') }}">
          Créer une page
          </a>
          <hr>
          {{ $pages->links() }}
          <hr>
</div>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <td>TITRE</td>
                        <td>Date de Création</td>
                        <td>Dernière Modification</td>
                        <td class="text-center">ACTIONS</td>
                    </tr>
                </thead>
                @foreach($pages as $page)
                    <tr>
                    <td>{{ $page->title }}</td>



                    {{-- <td>

                       @if ($page->category)
                       {{ $page->category->title }}
                        @endif
                    </td> --}}


                    <td>{{ $page->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $page->updated_at->diffForHumans() }}</td>

                                  <td class="text-right">     <a class="mb-2 btn btn-secondary m-2 p-1 text-right" href="{{ route('pages.edit', ['id'=>$page->id]) }}">
                                   Modifier la page
                                  </a>


                                   <form action="{{ route('pages.destroy',  ['id'=>$page->id]) }}" method="POST">
                                      @method('DELETE')
                                      @csrf
                                      <button class="mb-2 btn btn-danger  m-2 p-1 " type="submit">Supprimer la page</button>
                                  </form> </td>



                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</div>
@endsection
