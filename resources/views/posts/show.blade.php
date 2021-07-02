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
					<div class="container">
						<div class="row">
							@if (Auth::check() && ($post->user_id !== Auth::user()->id))
								@if ($post->likes()->where('user_id', Auth::user()->id)->exists())
									<form method="POST" action="/posts/{{ $post->id }}/{{ Auth::user()->id }}/dislike">
										@method('PUT')
										@csrf
										<button type="submit" class="btn btn-link">Unlike</button>
									</form>
								@else
									<form method="POST" action="/posts/{{ $post->id }}/{{ Auth::user()->id }}/like">
										@method('PUT')
										@csrf
										<button type="submit" class="btn btn-link">Like</button>
									</form>
								@endif
							@endif
						</div>
					</div>
					<div class="container">
						<div class="row">
							<a href="/posts" class="btn btn-outline-secondary mr-1">Back</a>
							@if (Auth::check() && ($post->user_id === Auth::user()->id))
								{{-- Update --}}
								<a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary mr-1">Edit</a>
								{{-- Archive --}}
								<form method="POST" action="/posts/{{ $post->id }}/archive">
									@method('PUT')
									@csrf
									<button type="submit" class="btn btn-outline-warning mr-1">Archive</button>
								</form>
								{{-- Delete --}}
								<form method="POST" action="/posts/{{ $post->id }}">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-outline-danger">Delete</button>
								</form>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection