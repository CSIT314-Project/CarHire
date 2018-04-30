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
			Year From:{{Form::selectRange('minYear', $data['car']->min('year'), $data['car']->max('year'), null, array('class' => 'form-control'))}}
			Year To:{{Form::selectRange('maxYear', $data['car']->min('year'), $data['car']->max('year'), $data['car']->max('year'), array('class' => 'form-control'))}}

			Make:{{Form::select('make', $data['makeArray'], null, array('class' => 'form-control'))}}
						
			Transmission: {{Form::select('transmission', $data['transmissionArray'], null, array('class' => 'form-control'))}}

			Kilometres From:{{Form::select('odometerMin', [0=>0, 25000=>25000,50000=>50000, 100000=>100000, 200000=>200000], null, array('class' => 'form-control'))}}

			Kilometres To:{{Form::select('odometerMax', ['any' => 'any', 25000 =>25000,50000=>50000, 100000=>100000, 200000=>200000], null, array('class' => 'form-control'))}}


			{{Form::submit('Search', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}
		{!! Form::close() !!}

		</div>	<!-- md-4 div end -->
		<div class="col-md-6">
			<br>
			@foreach($data['car'] as $cars)
				@if($data['firstRun'] != true)
					@if($cars->year >= $data['minYear'] && 
						$cars->year <= $data['maxYear'] && 
						$cars->odometer >= $data['odometerMin'] &&
						(
							$cars->odometer <= $data['odometerMax'] || 
							$data['odometerMax'] == 'any'
						)
						&&
						(
							$cars->make == $data['make'] || 
							$data['make']=="any"
						)
						&&
						(
							$cars->transmission == $data['transmission'] || 
							$data['transmission']=="any"
						))
							debug: {{$cars->odometer}}={{$data['odometerMin']}}
							<div class="jumbotron">
							<img src="{{ asset($cars->photo) }}" style="width:25%">
							{{$cars->year}} {{$cars->make}} {{$cars->model}} {{$cars->transmission}} {{$cars->odometer}} Kilometres
							</div>

					@endif
				@endif
			@endforeach
		</div>	<!-- md-8 div end -->
	</div>	<!-- row div end -->
@endsection
