@extends('layouts.admin-master')

@section ('styles')
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/form.css') }}">
@endsection

@section('content')
	<div class="container">
		@include('includes.info-box')
		<form action="{{ route('admin.blog.post.create') }}" method="post">
			<div class="input-group">
				<label for="title">Title</label>
				<input type="text" name="title" id="title" value="{{ Request::old('title') }}" {{ $errors->has('title') ? 'class=has-error':'' }} >
			</div>
			<div class="input-group">
				<label for="author">Author</label>
				<input type="text" name="author" id="author" value="{{ Request::old('author') }}" {{ $errors->has('author') ? 'class=has-error':'' }}>
			</div>
			<div class="input-group">
				<label for="category_select">Add Categories</label>
				<select name="category_select" id="category_select">
					<!-- vong lap for output category -->
					<option value="Dummy Category ID">Dummy Category</option>
				</select>
				<button type="button">Add Category</button>
				<div class="added-categories">
					<ul>
						<!-- <li></li> -->
					</ul>
				</div>
				<input type="hidden" name="categories" id="categories">
			</div>
			<div class="input-group">
				<label for="body">Body</label>
				<textarea name="body" id="body" rows="12" {{ $errors->has('body') ? 'class=has-error':'' }}>{{ Request::old('body') }}</textarea>
			</div>
			<button type="submit" class="btn">Create Post</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ URL::to('src/js/posts.js') }}"></script>
@endsection