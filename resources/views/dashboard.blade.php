@extends('layouts.app')


@section('contents')
<br>
 <a href="/posts/create" class="btn btn-success">New Post</a>
 <div class="card my-2">
     <div class="card-header">Your blog Posts</div>
     <div class="card-body">
         @if(count($posts) > 0)
         <table class="table">
             <tr>
                 <th>Title</th>
                 <th>Date</th>
                 <th colspan="2"></th>
             </tr>
         
          @foreach($posts as $post)
          <h4></h4>
          <tr>
              <td>{{ $post->title }}</td>
              <td>{{ $post->created_at }}</td>
              <td>
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning ">Edit</a>
               </td>
               <td>
                  {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-danger '])}}
                 {!! Form::close() !!}
              </td>
          </tr>
          @endforeach
          </table>
         @else
          <div class="alert alert-info">You have no posts yet</div>

         @endif
     </div>
 </div>
@endsection
