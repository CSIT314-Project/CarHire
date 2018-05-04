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
					<button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="position: absolute; right:20px;">Add</button>
				</div>
			</div>
			
		<div class="col-md-8">
			<!-- Display user cars here -->
			<center>No cars added yet</center>
		</div>	<!-- md-8 div end -->
	</div>	<!-- row div end -->

		<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Add New Car</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	      <div class="modal-body">
	        <form>
	        	<div class="form-group row">
				  <label for="make-text-input" class="col-2 col-form-label">Make: </label>
				  <div class="col-10">
				    <input class="form-control" type="text" value="e.g. Toyota" id="make-text-input">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="model-text-input" class="col-2 col-form-label">Model: </label>
				  <div class="col-10">
				    <input class="form-control" type="text" value="e.g. CRX" id="model-text-input">
				  </div>
				</div>

				<div class="form-group row">
				  <label for="year-input" class="col-2 col-form-label">Year: </label>
				  <div class="col-10">
				    <input class="form-control" type="number" value="e.g. Toyota" id="year-input">
				  </div>
				</div>

				<div class="form-group row">
				  <label for="odometer-input" class="col-2 col-form-label">Odometer: </label>
				  <div class="col-10">
				    <input class="form-control" type="number" value="e.g. Toyota" id="odometer-input">
				  </div>
				</div>

				<div class="form-group row">
				  <label for="transmissionSelector" class="col-2 col-form-label">Transmission: </label>
					 <div class="dropdown" style="padding-left: 15%">
					  <select class="form-control" aria-labelledby="transmissionSelector" id="transmissionSelector">
					    <option>Automatic</option>
					    <option>Manual</option>
					  </select>
					</div>
				</div>	

				<div class="form-group row">
				  <label for="typeSelector" class="col-2 col-form-label">Type: </label>
					 <div class="dropdown" style="padding-left: 15%">
					  <select class="form-control" aria-labelledby="typeDropdown" id="typeSelector">
					   <option>4WD</option>
					   <option>Coupe</option>
					   <option>Convertible</option>
					   <option>Sedan</option>
					  </select>
					</div>
				</div>

				<div class="form-group row">
				 	<label for="typeSelector" class="col-2 col-form-label">Image: </label>
					<input id="carImage" name="carImage" type="file" class="file" data-show-preview="false" style="padding-left: 15%">			
				</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
	      </div>
	    </div>

	  </div>
	</div>
@endsection
