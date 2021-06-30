@extends('layouts.app')

@section('content')
	<div class="container">
			<div class="row">
				<h1>Display all posts</h1>
			</div>
			@foreach ($posts as $post)
				<div class="row">
					<div class="card mb-3" style="width:50%">
						<div class="card-body">
							<h3 class="card-title">{{ $post->title }}</h3>
							<p class="card-text">{{ $post->content }}</p>
						</div>
					</div>
				</div>
			@endforeach
	</div>
@endsection