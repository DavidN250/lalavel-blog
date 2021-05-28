@extends('layouts.app')
    @section('contents')

      <h2>Edit Post</h2>
      	@include('inc.messages')
      {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$post->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
     	<div class="form-group">
     		{{Form::label('title', 'Title')}}
     		{{Form::text('title',$post->title , ['class' => 'form-control','placeholder' => 'Post Title'])}}
     	</div>
     	<div class="form-group">
     		{{Form::label('body', 'Body')}}
     		{{Form::textarea('body',$post->body , ['id' => 'article-ckeditor','class' => 'form-control','placeholder' => 'Post Body Text'])}}
     	</div>
      <div class="form-group">
        {{Form::label('cover', 'Cover Image')}}
        {{Form::file('cover_image', ['class' => 'form-control','placeholder' => 'Post Title'])}}
      </div>
      {{Form::hidden('_method', 'PUT')}}
     	{{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}

	  {!! Form::close() !!}

    @endsection