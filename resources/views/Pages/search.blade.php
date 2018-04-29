@extends('main')

@section('Title','Search')
@include('Partials._navbar')
@include('Partials._loginStyle')


@section('search')
<header></header>
	<div class="row">
		<div class="col-md-4 offset-md-1" >
			 <h1>Test</h1>

		{!! Form::open(['route' => 'cars.store']) !!}

			<!--this will dynamically set the lowest and highest values for year-->
			From: {{Form::selectRange('minYear', $data['car']->min('year'), $data['car']->max('year'), null, array('class' => 'form-control'))}}
			To: {{Form::selectRange('maxYear', $data['car']->min('year'), $data['car']->max('year'), null, array('class' => 'form-control'))}}

			Make: {{Form::select('make', $data['makeArray'], null, array('class' => 'form-control'))}}

			{{Form::submit('Search', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}
		{!! Form::close() !!}

		</div>	<!-- md-4 div end -->
		<div class="col-md-6">
			<br>
			@foreach($data['car'] as $cars)
				@if($cars->year >= $data['minYear'] && 
					$cars->year <= $data['maxYear'] && 
					($data['makeArray'][$data['make']] == $cars->make || $data['makeArray'][$data['make']] == "none"))

						<div class="jumbotron">
							{{$cars->year}} {{$cars->make}} {{$cars->model}}
						<img src="{{$cars->photo}}"  style="width:25%">
						</div>

				@endif
			@endforeach
		</div>	<!-- md-8 div end -->
	</div>	<!-- row div end -->
@endsection
