@extends('layouts.app')

@section('content')

@foreach($categories as $category)
       <div class="col-12 text-center p-1" ><a class="btn btn-info  " href="{{route('category',['id' => $category->title]) }}">{{ $category->title }}</a></div>
@endforeach


{{ $posts->links() }}
            @foreach($posts as $post)

            <div class="col-md-8 mx-auto mt-5">

          <div class="card md-6 shadow-sm">

          <div class="card-header">
               <a href="{{route('article',['id' => $post->id]) }}">
                {{ $post->title }} </a>
                </div>
            <div class="card-body">
              <p class="card-text">{{ $post->content }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group text-center mx-auto">
                  <a href="{{route('article',['id' => $post->id]) }}"><button  type="button" class="btn btn-sm btn-outline-secondary">Voir</button> </a>

                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        </div>
    </div>
</div>
@endsection
