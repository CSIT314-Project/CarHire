@extends('main')

@section('Title','Search')
@include('Partials._navbar')
@include('Partials._loginStyle')


@section('search')
<header></header>
	<div class="row">
		<div class="col-md-2 offset-md-1" >
			 <h1>Test</h1>
			{!! Form::open(['route' => 'cars.store']) !!}

			{{Form::label('year', 'Year:')}}
			{{Form::text('year', null, array('class' => 'form-control'))}}

			
			{{Form::submit('Search', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}
		{!! Form::close() !!}
		</div>	<!-- md-4 div end -->
			
		<div class="col-md-8">
			<br>
			@foreach($data['car'] as $cars)
				@if($cars->year > $data['year'])
				<div class="jumbotron">
					{{$cars->year}} {{$cars->make}} {{$cars->model}}
				<img src="{{$cars->photo}}"  style="width:25%">
				</div>
				@endif
			@endforeach
		</div>	<!-- md-8 div end -->
	</div>	<!-- row div end -->
@endsection
