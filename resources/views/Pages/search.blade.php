@extends('main')

@section('Title','Search')
@include('Partials._navbar')
@include('Partials._loginStyle')


@section('search')
<header></header>

<div class="row">
	<div class="col-md-4 offset-md-1" >
		<div class="card text-white" style="background-color: rgba(0,0,0,0.60);">
			<div class="card-body" >
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

				<big>Availibility:</big><br>
						<div class="form-group">
	
				Monday: {{Form::checkbox('mon', '1', null, array('class' => '', 'style' => ''))}}<br>
				
				Tuesday: {{Form::checkbox('tue', '1', null,array('class' => 'offset-md-2'))}}<br>

				Wednesday: {{Form::checkbox('wed', '1', null,array('class' => 'offset-md-2'))}}<br>

				Thursday: {{Form::checkbox('thu', '1', null,array('class' => 'offset-md-2'))}}<br>

				Friday: {{Form::checkbox('fri', '1', null,array('class' => 'offset-md-2'))}}<br>

				Saturday: {{Form::checkbox('sat', '1', null,array('class' => 'offset-md-2'))}}<br>

				Sunday: {{Form::checkbox('sun', '1', null,array('class' => 'offset-md-2'))}}<br>
				</div>

				{{Form::submit('Search', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}
			</div>	<!-- md-4 div end -->
		</div>
	</div>

	<div class="col-md-6">
		<div align="right">
			Sort By: {{Form::select('order', $data['orderArray'], null, array('onchange' => 'submit(this)'))}}
			{!! Form::close() !!}
		</div>
		@foreach($data['car'] as $cars)
		<div class="container">
			<div class="jumbotron text-white" style="background-color: rgba(0,0,0,0.60);">
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

						<small>Available on:</small>
						<br>
						<h5>
							@if($cars->mon)
							Mon
							@endif
							
							@if($cars->tue)
							Tue
							@endif

							@if($cars->wed)
							Wed
							@endif

							@if($cars->thu)
							Thu
							@endif

							@if($cars->fri)
							Fri
							@endif

							@if($cars->sat)
							Sat
							@endif

							@if($cars->sun)
							Sun
							@endif
						</h5>
						@if(DB::table('transactions')
							->where('ownerID', '=', $cars->owner)
							->sum('ownerRating') 
							+ 
							DB::table('transactions')
							->where('renteeID', '=', $cars->owner)
							->sum('renteeRating') != 0)
							This users average rating is: 
							{{          (DB::table('transactions')
								->where('ownerID', '=', $cars->owner)
								->sum('ownerRating') 
								+ 
								DB::table('transactions')
								->where('renteeID', '=', $cars->owner)
								->sum('renteeRating')
							)
							/
							(
								DB::table('transactions')
								->where('ownerID', '=', $cars->owner)
								->count('ownerRating') 
								+ 
								DB::table('transactions')
								->where('renteeID', '=', $cars->owner)
								->count('renteeRating')
							)
						}}
						<br>
						<br>

						@endif

						<a href="/messages/{{$cars->owner}}" class="btn btn-info">Message User</a>

						<br>

						<br>

						<button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCarModal">Rent</button>
						<div class="col-md-4"> 
							<div id="addCarModal" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Add New Car</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body" style="margin: 2%;">
											{!! Form::open(['route' => 'transactions.store']) !!}
											Hours:
											{{form::text('hours', null,array('class' => 'form-control', 'placeholder' => 'e.g. 4')) }}
											Day:
											{{form::select('day',  ['mon'=>'Monday','tue'=>'Tuesday','wed'=>'Wednesday','thu'=>'Thursday','fri'=>'Friday','sat'=>'Saturday','sun'=>'Sunday']) }}
											<input type="hidden" name="ownerID" value={{$cars->owner}}>
											<input type="hidden" name="carID" value={{$cars->id}}>

											{{Form::submit('Rent', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'))}}

											<hr>
											{!! Form::close() !!}
										</div>
									</div> <!-- end modal content-->
								</div><!--end modal dialog -->
							</div><!-- end Modal form-->
						</div> 


					</div>
				</div>
			</div>
		</div>
		@endforeach

		<!--@include('Partials._pagination')-->
	</div>	<!-- md-8 div end -->
</div>	<!-- row div end -->
@endsection
