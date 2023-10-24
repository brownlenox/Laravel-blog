@extends('layouts.app')
@section('content')
<div class="container mb-5">
  <div class="titlebar">
    <a class="btn btn-secondary float-end mt-3" href="{{ route('posts.create') }}" role="button">Add Post</a>
    <h1>MyPosts list</h1>
  </div>
    
  <hr>
  <!-- Message if a post is posted successfully -->
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  @if (isset($posts) && count($posts) > 0)
    <div class="card-container mb-5" style="display: flex; justify-content: space-between; flex-wrap: wrap; width: 100%;">
      @foreach ($posts as $post)
      <div class="card" style="width: 48%; margin-bottom: 10px;">
        <div class="card-image-container" style="height: 400px; overflow: hidden;">
          <img class="img-fluid rounded card-img-top"  style="height: 100%; object-fit: cover;" src="{{ asset('images/'.$post->image)}}" alt="Card image">
        </div>
        <div class="card-body">
          <h4>{{$post->title}}</h4>
          <p>{{$post->description}}</p>
          <a class="btn btn-secondary  mx-5" href="{{ route('posts.edit', ['post' => $post->id]) }}" role="button">Edit</a>
        </div>
      </div>
    @endforeach
    </div>
  @else
    <p>No Posts found</p>
  @endif
</div>
@endsection