<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<style type="text/css">
header {

	position: fixed;
	left: 0;
	right: 0;
	z-index: -1;

	display: block;
	background-image: url('/images/{{rand(2,3)}}.jpg');
	width: 100%;
	height: 100%;

	-webkit-filter: blur(5px);
	-moz-filter: blur(5px);
	-o-filter: blur(5px);
	-ms-filter: blur(5px);
	filter: blur(5px);

	background-size:cover;
}

.speech-bubble-right {
	position: relative;
	background: #28a745;
	border-radius: .4em;
}

.speech-bubble-right:after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 50%;
	width: 0;
	height: 0;
	border: 20px solid transparent;
	border-top-color: #28a745;
	border-bottom: 0;
	border-right: 0;
	margin-left: -10px;
	margin-bottom: -20px;
}
.speech-bubble-left {
	position: relative;
	background: lightgrey;
	border-radius: .4em;
}

.speech-bubble-left:after {
	content: '';
	position: absolute;
	bottom: 0;
	left: 50%;
	width: 0;
	height: 0;
	border: 20px solid transparent;
	border-top-color: lightgrey;
	border-bottom: 0;
	border-left: 0;
	margin-left: -10px;
	margin-bottom: -20px;
}
footer {
    position: fixed;
    height: 30px;
    bottom: 0;
    width: 100%;
    color: white;
}
.footer {
    position: relative;
    height: 30px;
    bottom: 0;
    width: 100%;
    color: white;
}
}
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
