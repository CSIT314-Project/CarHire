@extends('main')

@section('Title','Dashboard')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('dashboard')
<header>
</header> 
<center><img src="images\logo2.png" style="margin-left: auto; margin-right: auto;display: block;width: 50%"></center>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4 offset-md-2" style="text-align: center;">
				<div class="card text-white" style="max-width: 36rem;background-color: rgba(0,0,0,0.15);">
					<div class="card-body">
						<a href="/garage"><img src="{{ asset('images\garage.svg') }}" style="width: 200px; height: 200px;" /></a>

						<h2>My Garage</h2>
						<p>Upload and navigate through your vehicles here</p>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="text-align: center;">
				<div class="card text-white" style="max-width: 36rem;background-color: rgba(0,0,0,0.15);">
					<div class="card-body">
						<a href="/cars"><img src="{{ asset('images\search.svg') }}" style="width: 200px; height: 200px;"/></a>
						<h2>Search</h2>
						<p>Find cars available for hire in your local area</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
