@extends('layouts.app')
    @section('contents')
    <div class="jumbotron text-center mt-5">
      <h1>{{ $title }}</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pulvinar eros sed neque maximus, vel volutpat odio facilisis. Pellentesque convallis laoreet dapibus. Fusce sit amet elementum mauris, id fermentum risus. Integer ultrices velit at nunc egestas, vel iaculis est lobortis. Integer mattis sagittis ligula vel viverra.</p>
      <p><a href="/login" class="btn btn-success">Login</a> <a href="/register" class="btn btn-primary">Register</a></p>
      </div>
    @endsection