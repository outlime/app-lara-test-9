<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jumbotron-narrow.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/add.css') }}">	
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	

	<title>Reminderz</title>
</head>
<body>
	<div class="container">
		
		<div class="jumbotron">
			{{-- Error Messages --}}
			@include('partials.messages')

			<h2>Reminder System</h2>
			<hr>
			
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
		            <button type="submit" class="btn btn-remind">Remind Me!</button>
		        </div>
		    </form>
	    </div>

	</div>

	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>