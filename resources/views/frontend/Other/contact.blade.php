@extends('layouts.master')

@section('title')
	Contact
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/form.css') }}">
@endsection

@section('content')
	@include('includes.info-box')
	<form action="" method="post" accept-charset="utf-8" id="contact-form">
		<div class="input-group">
			<label for="name">Your Name</label>
			<input type="text" name="name" id="name">
		</div>
		<div class="input-group">
			<label for="email">Your Email</label>
			<input type="text" name="email" id="email">
		</div>
		<div class="input-group">
			<label for="subject">Your Subject</label>
			<input type="text" name="subject" id="subject">
		</div>
		<div class="input-group">
			<label for="message">Your Message</label>
			<textarea name="message" rows="10" id="message"></textarea>
		</div>
		<button type="submit" class="btn">Submit Message</button>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
@endsection