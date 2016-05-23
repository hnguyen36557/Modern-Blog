@extends('layouts.admin-master')

@section ('styles')
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/form.css') }}">
@endsection

@section('content')
	<div class="container">
	@include('includes.info-box')
	<section id="post-admin">
		<a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a>
	</section>
		<section class="list">
				@if(count($posts) == 0)
					No Posts
				@else
					@foreach($posts as $post)
						<article>
							<div class="post-info">
								<h3>{{ $post->title }}</h3>
								<span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
							</div>
							<div class="edit">
								<nav>
									<ul>
										<li><a href="">View</a></li>
										<li><a href="">Edit</a></li>
										<li><a href="" class="danger">Delete</a></li>
									</ul>
								</nav>
							</div>
						</article>
					@endforeach		
				@endif
		</section>
		@if($posts->lastPage() > 1)
		<secion class="pagination">
			@if( $posts->currentPage() !== 1 )
			@endif
			@if( $posts->currentPage() !== $posts->lastPage() )
				<a href="{{ $posts->nextPageUrl() }}"><i class="fa fa-caret-right"></i></a>
			@endif
		</secion>
	@endif
	</div>

@endsection