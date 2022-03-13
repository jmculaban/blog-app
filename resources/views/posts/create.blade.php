@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<h1>Create a new post</h1>
		</div>
		<div class="row">
			<form method="POST" action="/posts">
        @csrf
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
          <label for="content">Content:</label>
          <input type="text" class="form-control" id="content" name="content">
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
		</div>
	</div>
@endsection