<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jumbotron-narrow.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome.min.css') }}">

	<title>Reminderz</title>
</head>
<body>
	<div class="container">
		@include('partials.messages')

		<h1>Reminder System</h1>
		<div class="jumbotron">
			{{-- Input form --}}
			<form method="POST" action="newpost">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        <div class="form-group">
		            <input type="email" name="email" required="required" class="form-control" placeholder="Enter your email" value="">
		        </div>
		        <div class="form-group">
		            <input type="date" name="date" required="required" class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
		        </div>
		        <div class="form-group">
		            <input type="time" name="time" required="required" class="form-control" value="{{ Carbon\Carbon::now()->format('H:i') }}">
		        </div>
		        <div class="form-group">
		            <textarea rows="3" name="reminder" required="required" class="form-control" placeholder="Reminder..."></textarea>
		        </div>
		        <hr>
		        <div class="form-group">
		            <button type="submit" class="btn btn-primary">Remind Me!</button>
		        </div>
		    </form>
	    </div>

	</div>

	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>