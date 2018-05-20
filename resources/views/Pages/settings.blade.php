@extends('main')

@section('Title','Settings')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('settings')
<header></header>
<center><h1>Settings</h1></center>
<div class="row" style="text-align: center">
	<div class="col-md-6 offset-md-3">
		<h3>Edit my Account Details</h3>
		<div class="card text-white" style="background-color: rgba(0,0,0,0.60);">
			<div class="card-header h3 font-weight-bold">{{ __('Edit Account') }}</div>
		{!! Form::open(['route' => ['settings.update', Auth::id()],'class' => 'form-control text-white', 'style' => 'background-color: rgba(0,0,0,0.60);' ]) !!}
			
			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Email:')}}
				{{form::text('email', null, array('id' => 'email','class' => 'form-control', 'placeholder' => 'e.g. name@example.com')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Licence Number:')}}
				{{form::text('licenceNum', null,array('class' => 'form-control', 'placeholder' => 'e.g. 18374056')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Phone Number:')}}
				{{form::number('phone', null, array('class' => 'form-control', 'placeholder' => 'e.g. 0412345678')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('BSB')}}
				{{form::number('bsb', null, array('class' => 'form-control', 'placeholder' => 'e.g. 123456')) }}
			</div>


			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Account Number')}}
				{{form::number('acctNum', null,array('class' => 'form-control', 'placeholder' => 'e.g. 1234567891234')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Card Number')}}
				{{form::number('cardNum', null,array('class' => 'form-control', 'placeholder' => 'e.g. 1234567891234')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('CCV')}}
				{{form::number('ccv', null,array('class' => 'form-control', 'placeholder' => 'e.g. 111')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Address')}}
				{{form::text('address', null,array('class' => 'form-control', 'placeholder' => 'e.g. 142 Wallaby Way')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('City')}}
				{{form::text('city', null,array('class' => 'form-control', 'placeholder' => 'e.g. Sydney')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Postcode')}}
				{{form::number('postcode', null,array('class' => 'form-control', 'placeholder' => 'e.g. 2000')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('State')}}
				{{form::text('state', null,array('class' => 'form-control', 'placeholder' => 'e.g. NSW')) }}
			</div>

			<div class="form-group row col-md-10 offset-md-1">
				{{form::label('Country')}}
				{{form::text('country', null,array('class' => 'form-control', 'placeholder' => 'e.g. Australia')) }}
			</div>
			{{Form::submit('Update Account', array('class' => 'btn btn-info'))}}

			{!! Form::close() !!} 
<hr>
			{!! Form::open(['route' => 'settings.store']) !!}
			{{Form::submit('Delete Account', array('class' => 'btn btn-danger'))}}
			{!! Form::close() !!} 
		</div>
	</div>
</div>
</div>

@endsection