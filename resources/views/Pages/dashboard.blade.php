@extends('main')

@section('Title','Dashboard')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('dashboard')
<header>
</header> 
  <center><h1><strong>Welcome to CarHire</strong></h1></center>
  <br>
  <div class="row">
      <div class="col-md-12">
	     <div class="row">
	      	<div class="col-md-4" style="text-align: center;">
	      		<a href=""><img src="{{ asset('images\garage.svg') }}" style="width: 200px; height: 200px;" /></a>
	      		<h2>My Garage</h2>
	      		<p>Upload and navigate through your vehicles here</p>
	      	</div>
	      	<div class="col-md-4" style="text-align: center;">
	      		<a href="/search"><img src="{{ asset('images\search.svg') }}" style="width: 200px; height: 200px;"/></a>
	      		<h2>Search</h2>
	      		<p>Find cars available for hire in your local area</p>
	      	</div>
	      	<div class="col-md-4" style="text-align: center;">
	      		<a href=""><img src="{{ asset('images\settings.svg') }}" style="width: 200px; height: 200px";/></a>
	      		<h2>Settings</h2>
	      		<p>Customize your account</p>
	      	</div>
	      </div>
      </div>
  </div>
</div>
@endsection
