@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header">Modification la page</div>

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
                    <form class="form-group text-center" action="{{ route('pages.update', ['id' => $page->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <label for="active">Actif</label>
                    <div class="form-check">

                    </div>
                    <label for="theme">Thème</label>
                    <select class="custom-select" name="theme" >
                        <option  @if($post->theme == 'Symfony') selected @endif value="symfony">Symfony</option>
                        <option  @if($post->theme == 'Laravel') selected @endif value="laravel">Laravel</option>
                        <option  @if($post->theme == 'Wordpress') selected @endif value="wordpress">Wordpress</option>

                    </select>

                    <input value="@if (old('title')) {{ old('title') }} @else {{ $page->title }} @endif" name="title" type="texte">
                    <input value="{{ $page->content }}" type="text" name="content">@if (old('content')) {{ old('content') }} @else {{ $page->content }} @endif
                    <input type="submit" value="envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
