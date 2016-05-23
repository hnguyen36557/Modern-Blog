@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/comon.css') }}">
@append

@if(Session::has('fail'))
	<section class="info-box fail">
		{{ Session::get('') }}
	</section>
@endif
@if(Session::has('success'))
	<section class="info-box sucess">
		{{ Session::get('sucess') }}
	</section>
@endif
@if(count($errors) > 0)
	<section class="info-box fail">
		<ul>
			@foreach($error->all() as $error)
				<li>{{  $error }}</li>
			@endforeach
		</ul>
	</section>
@endif