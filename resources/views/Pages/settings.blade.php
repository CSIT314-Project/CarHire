@extends('main')

@section('Title','Settings')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('settings')
<header></header>
<center><h1>Settings</h1></center>
<div class="row" style="text-align: center">
	<div class="container"><br><br></div>
	<div class="col-md-12">
		{!! Form::open(['route' => 'settings.store']) !!}
		{{Form::submit('Delete Account', array('class' => 'btn btn-danger'))}}
		{!! Form::close() !!}
	</div>
</div>

@endsection