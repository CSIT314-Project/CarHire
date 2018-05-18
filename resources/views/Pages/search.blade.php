@extends('main')

@section('Title','Search')
@include('Partials._navbar')
@include('Partials._loginStyle')


@section('search')
<header></header>
<div class="row">
	<div class="col-md-4 offset-md-1" >
		<h1>Search</h1>

		{!! Form::open(['route' => 'cars.store']) !!}

		<!--this will dynamically set the lowest and highest values for year-->
		Year From:{{Form::selectRange('minYear', DB::table('cars')->min('year'), DB::table('cars')->max('year'), null, array('class' => 'form-control'))}}
		Year To:{{Form::selectRange('maxYear', DB::table('cars')->min('year'), DB::table('cars')->max('year'), DB::table('cars')->max('year'), array('class' => 'form-control'))}}

		Make:{{$data['makeForm']}}

		Transmission: {{Form::select('transmission', $data['transmissionArray'], null, array('class' => 'form-control'))}}

		Kilometres From:{{Form::select('odometerMin', [0=>0, 25000=>25000,50000=>50000, 100000=>100000, 200000=>200000], null, array('class' => 'form-control'))}}

		Kilometres To:{{Form::select('odometerMax', ['any' => 'any', 25000 =>25000,50000=>50000, 100000=>100000, 200000=>200000], null, array('class' => 'form-control'))}}

		City:{{Form::select('city', $data['cityArray'], null, array('class' => 'form-control'))}}

		Rate From (per hour):{{Form::select('rateMin', [0=>0, 25=>25,50=>50, 75=>75, 100=>100], null, array('class' => 'form-control'))}}

		Rate To (per hour):{{Form::select('rateMax', [999999 => 'any', 25 =>25,50=>50, 75=>75, 100=>100], null, array('class' => 'form-control'))}}

		{{Form::submit('Search', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}
	</div>	<!-- md-4 div end -->

	<div class="col-md-6">
		<br>
		<div align="right">
			Sort By: {{Form::select('order', $data['orderArray'], null, array('onchange' => 'submit(this)'))}}
			{!! Form::close() !!}
		</div>
		@foreach($data['car'] as $cars)
		<div class="container">
			<div class="jumbotron">
				<div class="row">	
					<div class="col-md-8">
						<img src="{{ asset('images/'.$cars->photo) }}" style="width:100%; text-align: left;">
						{{$cars->description}}
					</div>
					<div class="col-md-4" style="text-align: right">
						<h2>{{$cars->make}} {{$cars->model}}</h2> 
						<small>Year:</small>
						<br>
						<h5>{{$cars->year}}</h5>	
						<!--Display correct tranmission-->
						<small>Transmission:</small>
						<br>
						<h5>{{$cars->transmission}}</h5>								
						<small>Odometer:</small>
						<br>
						<h5>{{$cars->odometer}} km</h5>
						<!--Display correct car type-->
						<small>Type:</small>
						<br>
						<h5>{{$cars->type}}</h5>	

						<small>Rate:</small>
						<br>
						<h5>{{$cars->rate}}/hour</h5>	

						<small>City:</small>
						<br>
						<h5>{{$cars->city}}</h5>	
						<br>
										</div>
			</div>
		</div>
	</div>
	@endforeach

	<!--@include('Partials._pagination')-->
</div>	<!-- md-8 div end -->
</div>	<!-- row div end -->
@endsection
