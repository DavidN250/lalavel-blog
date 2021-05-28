@extends('layouts.app')
    @section('contents')

      <a href="/posts" class="btn btn-success my-3">Go Back</a>
        @include('inc.messages')
          <div class="card p-2 mb-2">
          	<h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
            <img src="../storage/cover_images/{{ $post->cover_image}}">
            <p>{{ $post->body }}</p>
          	<small>Written at {{ $post->created_at }}  by {{ $post->user->name }}</small>
          </div>
          @if(!Auth::guest())
          @if(Auth::user()->id == $post->user->id)
          <div class="row">
            <div class="col-md-1 mb-1">
              <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning btn-block">Edit</a>
            </div>
            <div class="col-md-1">
              {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])}}
              {!! Form::close() !!}
            </div>
          </div>
          @endif
          @endif
    @endsection