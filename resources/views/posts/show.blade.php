@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card mb-3" style="width:50%">
				<div class="card-body">
					<h3 class="card-title">
						{{ $post->title }}
					</h3>
					<small>Posted by: {{ $post->user->name }}</small> &middot; <small>Created at {{ (new Carbon\Carbon($post->created_at))->toFormattedDateString() }}</small>
					<p class="card-text">{{ $post->content }}</p>
					<a href="/posts" class="btn btn-outline-secondary">Back</a>
					@if (Auth::check())
						<a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection