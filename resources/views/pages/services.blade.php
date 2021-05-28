@extends('layouts.app')
    @section('contents')
      <h1>Our services </h1>
      @if(count($services) > 0)
      <ul class="list-group">
      	@foreach($services as $service)
      	<li class="list-group-item">{{ $service }}</li>
      	@endforeach
      </ul>
      @endif
    @endsection
