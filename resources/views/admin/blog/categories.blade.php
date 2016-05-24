@extends('layouts.admin-master')

@section('styles')
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/categories.css') }}">
@endsection

@section('content')
	<div class="container">
		<section id="category-admin">
			<form action="" method="post">
				<div class="input-group">
					<label for="name">Category Name</label>
					<input type="text" name="name" id="name">
					<button type="submit" class="btn">Create Catrgoty</button>
				</div>
			</form>
		</section>
		<section class="list">
			@foreach($categories as $category)
				<article>
					<div class="category-info" data-id="{{ $category->id }}">
						<h3>{{ $category->name }}</h3>
					</div>
					<div class="edit">
						<nav>
							<ul>
								<li  class="category-edit"><input type="text" name=""></li>
								<li><a href="#">Edit</a></li>
								<li><a href="#" class="danger">Delete</a></li>
							</ul>
						</nav>
					</div>
				</article>
			@endforeach
		</section>
		@if($categories->lastPage() > 1)
			<secion class="pagination">
				@if( $categories->currentPage() !== 1 )
				@endif
				@if( $categories->currentPage() !== $categories->lastPage() )
					<a href="{{ $categories->nextPageUrl() }}"><i class="fa fa-caret-right"></i></a>
				@endif
			</secion>
		@endif
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		var token = "{{Session::token()}}";
	</script>
	<script type="text/javascript" src="{{ URL::to('src/js/categories.js') }}"></script>
@endsection