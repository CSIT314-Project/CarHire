@extends('main')

@section('Title','Settings')
@include('Partials._navbar')
@include('Partials._loginStyle')

@section('settings')
<header></header>
	<center><h1>Settings</h1></center>
	<div class="row" style="text-align: center">
		<div class="container"><br><br></div>
		<div class="col-md-12">
				<a href="" onclick="confirmDelete()">Delete account</a>
		</div>
	</div>

<script>
function confirmDelete() {
    confirm("Proceeding will terminate your account data permanently!\nAre you sure you wish to proceed?");
}
</script>
@endsection