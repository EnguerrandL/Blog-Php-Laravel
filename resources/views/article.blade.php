@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $post->title }}</div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $post->content }}
                    
                </div>
                <a href="{{route('articles')}}"><button type="button" class="mx-auto btn btn-primary">Revenir aux articles</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
