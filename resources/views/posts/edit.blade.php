@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h1>Edit an existing post</h1>
		</div>
		<div class="row">
			<form method="POST" action="/posts/{{ $post->id }}">
				@method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
          <label for="content">Content:</label>
          <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}">
        </div>
        <button type="submit" class="btn btn-outline-primary">Save</button>
        <a href="/posts/{{ $post->id }}" class="btn btn-outline-secondary">Cancel</a>
      </form>
		</div>
	</div>
@endsection