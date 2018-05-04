@extends('layouts.app')
@include('Partials._navbar')
@include('Partials._loginStyle')
<header></header>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h3 font-weight-bold">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h3>Personal Details</h3>

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="licenceNum" class="col-md-4 col-form-label text-md-right">{{ __('Licence Number') }}</label>

                            <div class="col-md-6">
                                <input id="licenceNum" type="text" class="form-control{{ $errors->has('licenceNum') ? ' is-invalid' : '' }}" name="licenceNum" value="{{ old('licenceNum') }}" required autofocus>

                                @if ($errors->has('licenceNum'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('licenceNum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postCode" class="col-md-4 col-form-label text-md-right">{{ __('Post Code') }}</label>

                            <div class="col-md-6">
                                <input id="postCode" type="text" class="form-control{{ $errors->has('postCode') ? ' is-invalid' : '' }}" name="postCode" value="{{ old('postCode') }}" required autofocus>

                                @if ($errors->has('postCode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('postCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" required autofocus>

                                @if ($errors->has('state'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>  
                        <h3>Contact Details</h3>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <h3>Password</h3>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <hr>
                        <h3>Bank Details</h3>

                        <div class="form-group row">
                            <label for="acctNum" class="col-md-4 col-form-label text-md-right">{{ __('Bank Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="acctNum" type="text" class="form-control{{ $errors->has('acctNum') ? ' is-invalid' : '' }}" name="acctNum" value="{{ old('acctNum') }}" required autofocus>

                                @if ($errors->has('acctNum'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('acctNum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="bsb" class="col-md-4 col-form-label text-md-right">{{ __('BSB Number') }}</label>

                            <div class="col-md-6">
                                <input id="bsb" type="text" class="form-control{{ $errors->has('bsb') ? ' is-invalid' : '' }}" name="bsb" value="{{ old('bsb') }}" required autofocus>

                                @if ($errors->has('bsb'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bsb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <h3>Payment Details</h3>

                        <div class="form-group row">
                            <label for="cardNum" class="col-md-4 col-form-label text-md-right">{{ __('Credit Card Number') }}</label>

                            <div class="col-md-6">
                                <input id="cardNum" type="text" class="form-control{{ $errors->has('cardNum') ? ' is-invalid' : '' }}" name="cardNum" value="{{ old('cardNum') }}" required autofocus>

                                @if ($errors->has('cardNum'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cardNum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ccv" class="col-md-4 col-form-label text-md-right">{{ __('CCV Number') }}</label>

                            <div class="col-md-6">
                                <input id="ccv" type="text" class="form-control{{ $errors->has('ccv') ? ' is-invalid' : '' }}" name="ccv" value="{{ old('ccv') }}" required autofocus>

                                @if ($errors->has('ccv'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ccv') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
