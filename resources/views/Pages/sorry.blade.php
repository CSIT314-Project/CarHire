@extends('main')

@section('Title','Dashboard')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('dashboard')
<header>
</header> 
<center><h1><strong>Welcome to Rent and Ride</strong></h1></center>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="offset-md-5 col-md-2" style="text-align: center;">


				<div class="card text-white bg-danger" style="max-width: 18rem;">
					<div class="card-body">
						<h5 class="card-title">Sorry</h5>
						<p class="card-text">Unfortunately you have failed our identity and/or credit check, please contact us if you believe this is in err. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection