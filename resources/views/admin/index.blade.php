@extends('layouts.admin-master')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/modal.css') }}">
@endsection

@section('content')
	<div class="container">
		@include('includes.info-box')
		<div class="card">
			<header>
				<nv>
					<ul>
						<li><a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a></li>
						<li><a href="{{ route('admin.blog.index') }}" class="btn">Show all Post</a></li>
					</ul>
				</nv>
			</header>
			<section>
				<ul>
					@if(count($posts) == 0)
						<li>No Posts</li>
					@else
						@foreach($posts as $post)
							<li>
								<article>
									<div class="post-info">
										<h3>{{ $post->title }}</h3>
										<span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
									</div>
									<div class="edit">
										<nav>
											<ul>
												<li><a href="{{ route('admin.blog.post',['post_id' => $post->id, 'end' => 'admin']) }}">View</a></li>
												<li><a href="{{ route('admin.blog.post.edit',['post_id' => $post->id]) }}">Edit</a></li>
												<li><a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}" class="danger">Delete</a></li>
											</ul>
										</nav>
									</div>
								</article>
							</li>
						@endforeach		
					@endif
				</ul>
			</section>
		</div>
		<div class="card">
			<header>
				<nv>
					<ul>
						<li><a href="" class="btn">Show all Messages</a></li>
					</ul>
				</nv>
			</header>
			<section>
				<ul>
					<!-- If no Messages -->
					<li>No Messages</li>
					<!-- If Messages -->
					<li>
						<article data-message="Body" data-id="ID">
							<div class="message-info">
								<h3>Message Title</h3>
								<span class="info">Sender: ... | Date</span>
							</div>
							<div class="edit">
								<nav>
									<ul>
										<li><a href="">View</a></li>
										<li><a href="" class="danger">Delete</a></li>
									</ul>
								</nav>
							</div>
						</article>
					</li>
				</ul>
			</section>
		</div>
	</div>
	<div class="modal" id="contact-message-info">
		<button class="btn" id="modal-close">Close</button>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		var token = "{{ Session::token() }}";
	</script>
	<script type="text/javascript" src="{{ URL::to('src/js/modal.js') }}"></script>
	<script type="text/javascript" src="{{ URL::to('src/js/contact_message.js') }}"></script>
@endsection