@extends('main')

@section('Title','Dashboard')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('dashboard')
<header>
</header> 
<br>
<div class="row">

  <div class="col-md-12">
    {!! Form::open(['route' => 'messages.store']) !!}

    @foreach($data['user'] as $user)	
    <div class="jumbotron col-md-10 offset-md-1">
      From: {{$user->firstName . ' ' . $user->lastName}} <p class="text-right"></p>
      <button class='btn btn-info' name="chatID" value={{$user->id}}>Chat</button>
    </div>
    @endforeach
    {!! Form::close() !!}

  </div>
</div>
@endsection