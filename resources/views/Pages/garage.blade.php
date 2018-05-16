@extends('main')

@section('Title','My Garage')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('garage')
<header>
</header> 
<center><h1>My Garage</h1></center>
<br>
<div class="row">	
	<div class="col-md-4">
		<div class="row" style="padding-left: 10%">
			<h2>Add New Car</h2>
			<button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCarModal" style="position: absolute; right:20px;">Add</button>
		</div>
	</div>
	<div class="col-md-8" style='text-align: right;'>
		<!-- Display user cars here -->
@foreach($data as $cars)
		<div class="container">
			<div class="jumbotron">
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
						<a class="btn-lg btn-info "
						href="https://twitter.com/intent/tweet?text=Come rent my {{$cars->make}} {{$cars->model}} at the Rent and Ride Website">Share</a>
						<br>
						<div style="position: absolute; bottom: 10px;right :10px;">
							{!! Form::open(['method'  => 'delete', 'route' => ['garage.destroy', $cars->id]])!!}
							{{form::submit('Remove',['class' => 'btn btn-danger btn-lg', 'type' => 'submit'])}}
							{!! Form::close() !!}
						</div>

					</div>
				</div>
			</div>
		</div>
	@endforeach
	</div>	<!-- md-8 div end -->
</div>	<!-- row div end -->
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
					{!! Form::open(['route' => 'garage.store', 'files' => 'true']) !!}
					<div class="form-group row">
						{{form::label('make', 'Make:')}}
						{{form::text('make', null, array('class' => 'form-control', 'placeholder' => 'e.g. Honda')) }}
					</div>

					<div class="form-group row">
						{{form::label('model', 'Model:')}}
						{{form::text('model', null,array('class' => 'form-control', 'placeholder' => 'e.g. CRX')) }}
					</div>

					<div class="form-group row">
						{{form::label('year', 'Year:')}}
						{{form::number('year', null, array('class' => 'form-control', 'placeholder' => 'e.g. 2001')) }}
					</div>

					<div class="form-group row">
						{{form::label('odometer', 'Odometer: ')}}
						{{form::number('odometer', null, array('class' => 'form-control', 'placeholder' => 'e.g. 35000')) }}
					</div>


					<div class="form-group row">
						{{form::label('description', 'Description:')}}
						{{form::textarea('description', null,array('class' => 'form-control', 'placeholder' => 'e.g. My car is great because...')) }}
					</div>

					<div class="form-group row">
						<div class="col-md-4" style="text-align: left;">{{form::label('city', 'City: ')}}</div>
						<div class="col-md-4">{{form::select('carType', [$data->cities], array('class' => 'form-control')) }}</div>
					</div>

					<div class="form-group row">
						<div class="col-md-4" style="text-align: left;">{{form::label('transmission', 'Transmission: ')}}</div>
						<div class="col-md-4">{{form::select('transmission',  ['Automatic'=>'Automatic','Manual'=>'Manual'], array('class' => 'form-control')) }}</div>
					</div>

					<div class="form-group row">
						<div class="col-md-4" style="text-align: left;">{{form::label('carType', 'Type: ')}}</div>
						<div class="col-md-4">{{form::select('carType', [ '4WD'=>'4WD', 'Convertible'=>'Convertible', 'Coupé'=>'Coupé', 'Sedan'=>'Sedan', 'Other'=> 'Other'], array('class' => 'form-control')) }}</div>
					</div>
					
					<div class="form-group row">
						{{form::label('rate', 'Rate/hour: ')}}*
						{{form::number('rate', null, array('class' => 'form-control', 'placeholder' => 'e.g. $35')) }}
						<small><sup>*</sup>5% insurance, 10% Rent and Ride commisioned will be taken from amount</small>
					</div>

					<div class="form-group row">
						<div class="col-md-4" style="text-align: left;">{{Form::label('carImage', 'Image:',['class' => 'control-label',  'style' => 'margin-right: 20px;'])}}</div>
						<div class="col-md-4">{{Form::file('carImage')}}</div>
					</div>		
				</div>	<!--end of modal body -->
				<div class="modal-footer">
					{{form::submit('Add',['class' => 'btn btn-info btn-lg', 'type' => 'submit'])}}
					{!! Form::close() !!}
				</div>
			</div> <!-- end modal content-->
		</div><!--end modal dialog -->
	</div><!-- end Modal form-->
</div> <!--end column div -->
@endsection
