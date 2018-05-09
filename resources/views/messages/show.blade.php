@extends('main')

@section('Title','Dashboard')
@include('Partials._navbar')
@include('Partials._loginStyle')
<style>
.speech-bubble-right {
	position: relative;
	background: #00ba35;
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
	border-top-color: #00ba35;
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
		<br>
		@foreach($data as $messages)
		@if($messages->from === Auth::user()->id)
		<div class="col-md-6 offset-md-6 speech-bubble-right" style="color:black;">
				{{$messages->message}}
		</div>
		@else
		<div class="col-md-6 speech-bubble-left" style="color:black;">
				<p>{{$messages->message}}<p>

			</hgroup>
		</div>

		@endif
		<br>
		@endforeach
	</div>
</div>
@endsection

