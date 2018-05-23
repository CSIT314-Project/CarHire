@extends('main')

@section('Title','Transactions')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('dashboard')
<header>
</header> 
<br>
<div class="row">

  <div class="col-md-12" >
    <center class="text-white" style="background-color: rgba(0,0,0,0.60);">
      <h5>
        Hired:
      </h5>
    </center>
    @foreach($data[0] as $transaction)	
    <div class="jumbotron col-md-10 offset-md-1 text-white" style="background-color: rgba(0,0,0,0.60);">
      On the {{$transaction->created_at}}, you hired a 

      {{App\Cars::find($transaction->carID)->make}} {{App\Cars::find($transaction->carID)->model}}


      from {{App\User::find($transaction->ownerID)->firstName}} {{App\User::find($transaction->ownerID)->lastName}} for {{$transaction->hours}} hours, at a total cost of ${{$transaction->cost}}, composed of ${{$transaction->cost*0.85}} profit to owner, ${{$transaction->cost*0.05}} insurance and ${{$transaction->cost*0.1}} commision to Rent and Ride.. 
      <hr>
      You received a rating of {{$transaction->renteeRating}} and gave a rating of {{$transaction->ownerRating}}
      @if($transaction->ownerRating==null)
      {!! Form::open(['route' => ['transactions.update', $transaction->id],'class' => 'form-control text-white', 'style' => 'background-color: rgba(0,0,0,0.60)' ]) !!}
      Rate Owner: {{Form::select('ownerRating', ['---' => '---','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], 'null', array('onchange' => 'submit(this)'))}}

      {!! Form::close() !!}
      @endif

    </div>
    @endforeach
    <center class="text-white" style="background-color: rgba(0,0,0,0.60);">
      <h5>
        Hired Out:
      </h5>
    </center>
    @foreach($data[1] as $transaction)  
    <div class="jumbotron col-md-10 offset-md-1 text-white" style="background-color: rgba(0,0,0,0.60);">
     On the {{$transaction->created_at}}, you hired out a {{App\Cars::find($transaction->carID)->make}} {{App\Cars::find($transaction->carID)->model}} to {{App\User::find($transaction->renteeID)->firstName}} {{App\User::find($transaction->renteeID)->lastName}} for {{$transaction->hours}} hours, for a total of ${{$transaction->cost}}, composed of ${{$transaction->cost*0.85}} profit, ${{$transaction->cost*0.05}} insurance and ${{$transaction->cost*0.1}} commision to Rent and Ride. 
     <hr>

     You received a rating of {{$transaction->ownerRating}} and gave a rating of {{$transaction->renteeRating}}
     @if($transaction->renteeRating==null)
     {!! Form::open(['route' => ['transactions.update', $transaction->id],'class' => 'form-control text-white', 'style' => 'background-color: rgba(0,0,0,0.60)']) !!}
     Rate Rentee: {{Form::select('renteeRating', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], null, array('onchange' => 'submit(this)'))}}

     {!! Form::close() !!}
     @endif
   </div>
   @endforeach

 </div>
</div>
@endsection