@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>          
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>            
            <td>
			@if ($post->canUserEdit()) 
			  <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
			@endif
			 </td>
            <td>
			@if ($post->canUserDelete()) 
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
			 @endif	
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection