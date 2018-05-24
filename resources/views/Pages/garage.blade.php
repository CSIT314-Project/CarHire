@extends('main')

@section('Title','My Garage')
@section('Garage','active')

@include('Partials._navbar')
@include('Partials._loginStyle')

@section('garage')
<header>
</header> 
<center><h1  class="text-white" style="background-color: rgba(0,0,0,0.60);">My Garage</h1></center>
<br>
<div class="row">	
		@if (session('status'))
		<div class="alert alert-danger col-md-4 offset-md-4">
			{{ session('status') }}
		</div>
		@endif
		@if (session('status2'))
		<div class="alert alert-success col-md-4 offset-md-4">
			{{ session('status2') }}
		</div>
		@endif

	<div class="col-md-12" style='text-align: right;'>
		<div class="row" style="text-align: center;">
			<jumbatron class="offset-md-3 col-md-6 text-white" style="background-color: rgba(0,0,0,0.80);">
				<h2>Add New Car</h2>
				<button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCarModal" style="">Add Car</button><br><br>
			</jumbatron>
		</div>
		<br>

		<!-- Display user cars here -->
		@foreach($data as $cars)
		<div class="container">
			<div class="jumbotron text-white" style="background-color: rgba(0,0,0,0.60);">
				<div class="row">	
					<div class="col-md-8">
						<img src="{{ asset('images/'.$cars->photo) }}" style="width:100%; text-align: left;">
						{{$cars->description}}
					</div>
					<div class="col-md-4" style="text-align: right;">
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
						<br>	
						<div> 
							<a class="btn-lg btn-info "
							href="https://twitter.com/intent/tweet?text=Come rent my {{$cars->make}} {{$cars->model}} at the Rent and Ride Website">Share</a>
							<br>
							<br>
							{!! Form::open(['method'  => 'delete', 'route' => ['garage.destroy', $cars->id]])!!}
							{{form::submit('Remove',['class' => 'btn btn-danger btn-lg', 'type' => 'submit'])}}
							{!! Form::close() !!}

							<button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editCarModal" style="position: absolute; right:20px;">Edit Availability</button>
							<div class="col-md-4"> 
								<div id="editCarModal" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content" style="background-color: rgba(0,0,0,0.60);text-align: left">
											<div class="modal-header">
												<h4 class="modal-title">Edit Availability</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body" style="margin: 2%;text-align: left;"">
												{!! Form::open(['route' => ['garage.update',$cars->id]]) !!}
												<big>{{ Form::Label('Available', 'Available: ')}}<br></big>
												<div class="form-group">
													<div class="row">
														<div class="col-md-3">
															<p>Monday: <br>
																Tuesday: <br>
																Wednesday:<br>
																Thursday: <br>
																Friday: <br>
																Saturday: <br>
															Sunday:</p> <br>
														</div>
														<div class="col-md-6" style="color: transparent;">
															<p>.{{Form::checkbox('mon', '1', null, array('class' => '', 'style' => ''))}}<br>

																.{{Form::checkbox('tue', '1', null,array('class' => ''))}}<br>

																.{{Form::checkbox('wed', '1', null,array('class' => ''))}}<br>

																.{{Form::checkbox('thu', '1', null,array('class' => ''))}}<br>

																.{{Form::checkbox('fri', '1', null,array('class' => ''))}}<br>

																.{{Form::checkbox('sat', '1', null,array('class' => ''))}}<br>

																.{{Form::checkbox('sun', '1', null,array('class' => ''))}}</p><br>
															</div>
														</div>

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
				</div>
				@endforeach
			</div>	<!-- md-8 div end -->
		</div>	<!-- row div end -->



		<div class="col-md-4" > 
			<div id="addCarModal" class="modal fade" role="dialog" >
				<div class="modal-dialog" >
					<!-- Modal content-->
					<div class="modal-content text-white" style="background-color: rgba(0,0,0,0.60);">
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
								{{form::label('rego', 'Registration Number: ')}}
								{{form::text('rego', null, array('class' => 'form-control', 'placeholder' => 'e.g. XYZ123')) }}
							</div>

							<div class="form-group row">
								{{form::label('description', 'Description:')}}
								{{form::textarea('description', null,array('class' => 'form-control', 'placeholder' => 'e.g. My car is great because...')) }}
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<p>City:<br>
											Transmission:<br>
										Type:</p> <br>
									</div>
									<div class="" style="color: transparent;">
										<p>
											.{{form::select('city', [$data->cities], array('class' => 'form-control')) }}<br>

											.{{form::select('transmission',  ['Automatic'=>'Automatic','Manual'=>'Manual'], array('class' => 'form-control')) }}<br>

											.{{form::select('carType', [ '4WD'=>'4WD', 'Convertible'=>'Convertible', 'Coupé'=>'Coupé', 'Sedan'=>'Sedan', 'Other'=> 'Other'], array('class' => 'form-control')) }}</p><br>
										</div>
									</div>
								</div>




								<div class="form-group row">
									{{form::label('rate', 'Rate/hour: ')}}*
									{{form::number('rate', null, array('class' => 'form-control', 'placeholder' => 'e.g. $35')) }}
									<small><sup>*</sup>5% insurance, 10% Rent and Ride commisioned will be taken from amount</small>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3">
											<p>Monday:<br>
												Tuesday:<br>
												Wednesday:<br>
												Thursday:<br>
												Friday:<br>
												Saturday:<br>
											Sunday:</p> <br>
										</div>
										<div class="" style="color: transparent;">
											<p>.{{Form::checkbox('mon', '1', null, array('class' => '', 'style' => ''))}}<br>

												.{{Form::checkbox('tue', '1', null,array('class' => ''))}}<br>

												.{{Form::checkbox('wed', '1', null,array('class' => ''))}}<br>

												.{{Form::checkbox('thu', '1', null,array('class' => ''))}}<br>

												.{{Form::checkbox('fri', '1', null,array('class' => ''))}}<br>

												.{{Form::checkbox('sat', '1', null,array('class' => ''))}}<br>

												.{{Form::checkbox('sun', '1', null,array('class' => ''))}}</p><br>
											</div>
										</div>


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
			</div>
		</div>
		@endsection
