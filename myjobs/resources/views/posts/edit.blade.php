@extends('layouts.app')

@section('content')

<a class="btn btn-secondary  mx-5 mt-2" href="{{ route('home')}}" role="button">Back</a>

<div class="container h-100 mt-5 mb-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h3>Update Post</h3>
        <section class="mt-3">
          @if($post)
            <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="card p-3">
                        <label for="floatingInput">Title</label>
                        <input class="form-control" type="text" name="title" value="{{ $post->title }}" required>
                        <label for="floatingTextArea">Description</label>
                        <textarea class="form-control" name="body" id="floatingTextArea" cols="30" rows="10" required>{{ $post->description }}</textarea>
                        <label for="formFile" class="form-label">Change Image</label>
                        <img src="{{ asset('images/' . $post->image) }}" alt="" class="img-blog">
                        <input class="form-control" type="file" name="image">
                    </div>

                    <button class="btn btn-secondary mt-3">Save</button>
                </div>
              </form>
              @else
              <P>Post is not accessible</P>
              @endif

              @if($post)
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm mt-3 mx-5">Delete</button>
            </form>
            @else
              <P>Post was deleted</P>
            @endif
            
          </section>

        </form>
      </div>
    </div>
  </div>

  @endsection



      