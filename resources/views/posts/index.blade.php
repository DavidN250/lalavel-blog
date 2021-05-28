@extends('layouts.app')
    @section('contents')
    <br>
    @include('inc.messages')
    @if(count($posts)>0)
       @foreach($posts as $post)
          <div class="card p-2 my-2">
            <div class="row">
              <div class="col-md-4">
                <img src="storage/cover_images/{{ $post->cover_image}}">
              </div>
              <div class="col-md-8">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <p>{{ $post->body }}</p>
                <small>Written at {{ $post->created_at }} by {{ $post->user->name }}</small>
              </div>
            </div>
          	
          </div>
       @endforeach
    @else
       <p>No Posts Yet</p>
    @endif
    @endsection