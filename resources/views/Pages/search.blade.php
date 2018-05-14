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

		{{Form::submit('Search', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}
	</div>	<!-- md-4 div end -->

	<div class="col-md-6">
		<br>
		<div align="right">
		Sort By: {{Form::select('order', $data['orderArray'], null, array('onchange' => 'submit(this)'))}}
		{!! Form::close() !!}
	</div>
		@foreach($data['car'] as $cars)
		<div class="jumbotron">
			<img src="{{ asset('images/'.$cars->photo) }}" style="height:25%">
			<p>{{$cars->year}} {{$cars->make}} {{$cars->model}} {{$cars->transmission}} {{$cars->odometer}} Kilometres</p>
		</div>
		@endforeach

		@include('Partials._pagination')
	</div>	<!-- md-8 div end -->
</div>	<!-- row div end -->
@endsection
