@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Post
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('posts.update', $post->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Post Name:</label>
          <input type="text" class="form-control" name="title" value={{ $post->title }} />
        </div>        
		<div class="form-group">
          <label for="name">Post Body:</label>          
		  <textarea name="body" class="form-control">{{ $post->body }}</textarea>
        </div>        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection