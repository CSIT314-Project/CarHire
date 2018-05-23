@extends('main')

@section('Title','Messages')
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
    <div class="jumbotron col-md-10 offset-md-1 text-white" style="background-color: rgba(0,0,0,0.60);">
      From: {{$user->firstName . ' ' . $user->lastName}} at {{$user->updated_at}}
      <br>
      <button class='btn btn-info' name="chatID" value={{$user->id}}>Chat</button>
      <br>
      @if(DB::table('transactions')
        ->where('ownerID', '=', $user->id)
        ->sum('ownerRating') 
        + 
        DB::table('transactions')
        ->where('renteeID', '=', $user->id)
        ->sum('renteeRating') != 0)

      This users average rating is: 
      {{          (DB::table('transactions')
        ->where('ownerID', '=', $user->id)
        ->sum('ownerRating') 
        + 
        DB::table('transactions')
        ->where('renteeID', '=', $user->id)
        ->sum('renteeRating')
      )
      /
      (
        DB::table('transactions')
        ->where('ownerID', '=', $user->id)
        ->count('ownerRating') 
        + 
        DB::table('transactions')
        ->where('renteeID', '=', $user->id)
        ->count('renteeRating')
      )
    }}


    @endif
  </div>

  @endforeach
  {!! Form::close() !!}

</div>
</div>
@endsection