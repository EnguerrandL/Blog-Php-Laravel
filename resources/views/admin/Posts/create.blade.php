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
                    <form class="text-center" action="{{ route('posts.store') }}" method="POST">
                    @csrf 
                    <input type="text" name="title">
                    <input type="text" name="content">
                    <input type="submit" value="envoyer">
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
