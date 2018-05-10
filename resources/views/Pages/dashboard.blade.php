@extends('main')

@section('Title','Dashboard')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('dashboard')
<header></header> 
	<div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
  <center><h1><strong>Welcome to Rent & Ride</strong></h1></center>
  <br>
  <div class="row">
      <div class="col-md-12">
	     <div class="row">
	      	<div class="col-md-4" style="text-align: center;">
	      		<a href="/garage"><img src="{{ asset('images\garage.svg') }}" style="width: 200px; height: 200px;" /></a>
	      		<a href="/garage" style="text-decoration: none; color: black"><h2>My Garage</h2></a>
	      		<p>Upload and navigate through your vehicles here</p>
	      	</div>
	      	<div class="col-md-4" style="text-align: center;">
	      		<a href="/search"><img src="{{ asset('images\search.svg') }}" style="width: 200px; height: 200px;"/></a>
	      		<a href="/search" style="text-decoration: none; color: black"><h2>Search</h2></a>
	      		<p>Find cars available for hire in your local area</p>
	      	</div>
	      	<div class="col-md-4" style="text-align: center;">
	      		<a href="/settings"><img src="{{ asset('images\settings.svg') }}" style="width: 200px; height: 200px";/></a>
	      		<a href="/settings" style="text-decoration: none; color: black"><h2>Settings</h2></a>
	      		<p>Customize your account</p>
	      	</div>
	      </div>
      </div>
  </div>
</div>
@endsection
