@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header">Création D'une page</div>

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
                    <form class="text-center" action="{{ route('pages.store') }}" method="POST">
                    @csrf
                    <label for="">Titre</label>
                    <input value="{{ old('title') }}" type="text" name="title">
                    <br>

                    <label for="slug">Slug</label>
                    <input value="{{ old('slug') }}" type="text" name="slug">
                    <br>


                    <label for="">Contenu</label>
                    <textarea name="content" id="content">
                        {{ old('content') }}
                    </textarea>
                    <br>





                    <input type="checkbox" name="draft"> Cocher si c'est un brouillon
                    <br>
                    <input type="checkbox" name="active"> Cocher si visible sur le site



                    <br>


                    <br>
                    <input type="submit" value="envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
