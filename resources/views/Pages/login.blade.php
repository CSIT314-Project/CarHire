@extends('main')

@section('Title','Login')
 
@section('register')
	<!--Display logo image-->
	<div class="col-xs-1" align="center">
		<img src="{{ asset('images\logo.png') }}"/>
		<h1><strong>Login</strong></h1>
	</div>
    <div class="row">	
    	<div class="col-xs-6 col-md-4"></div>
    	<div class="col-xs-6 col-md-4">
	        <form>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <small><center>Don't have an account? Register here</center><small>	
			  <div class="row">
	
			  	<div class="col-md-6" style="text-align: right">
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
				<div class="col-md-6" style="text-align: left">
			  		<a href="/register"<button class="btn btn-primary">Register</button></a>
			  	</div>
			  </div>
			</form>
		</div> <!--Div "" end-->
	  	<div class="col-xs-6 col-md-4"></div>
	</div><!--Div "row" end-->
@endsection