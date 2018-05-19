@extends('main')

@section('Title','Dashboard')
@include('Partials._navbar')
@include('Partials._loginStyle')
<style>
.speech-bubble-right {
	position: relative;
	background: #28a745;
	border-radius: .4em;
}

.speech-bubble-right:after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 50%;
	width: 0;
	height: 0;
	border: 20px solid transparent;
	border-top-color: #28a745;
	border-bottom: 0;
	border-right: 0;
	margin-left: -10px;
	margin-bottom: -20px;
}
.speech-bubble-left {
	position: relative;
	background: lightgrey;
	border-radius: .4em;
}

.speech-bubble-left:after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 50%;
	width: 0;
	height: 0;
	border: 20px solid transparent;
	border-top-color: lightgrey;
	border-bottom: 0;
	border-left: 0;
	margin-left: -10px;
	margin-bottom: -20px;
}
</style>
@section('dashboard')
<header>
</header> 
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12  card-header" style="color:black; text-align:  center;">
			<big>You are messaging {{$data['name']}}</big>
		</div>
		<br>
		@foreach($data['table'] as $messages)
		@if($messages->from === Auth::user()->id)
		<div class="col-md-5 offset-md-6 speech-bubble-right" style="color:black;">
			<p>{{$messages->message}}</p>
		</div>
		@else
		<div class="col-md-5 offset-md-1 speech-bubble-left" style="color:black;">
			<p>{{$messages->message}}</p>
		</div>
		@endif
		<br>
		@endforeach
		

		{!! Form::open(['route' => ['messages.update', $data['fromID']],'class' => 'form-control offset-md-2 col-md-8' ]) !!}
		{{Form::textarea('sentMessage',null, array('class' => 'form-control', 'style' => 'background-color:#dbdbdb;height:10%;'))}}
		<hr>
		{{Form::submit('Send', array('class' => 'btn btn-success btn-lg btn-block form-control'))}}
		{!! Form::close() !!}


	</div>
</div>

@endsection

