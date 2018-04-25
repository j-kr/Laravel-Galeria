@extends('layouts.app')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
	

    <title>My Gallery</title>
</head>
<body>
    <div class="container">
        @if(Session::has('flash_message'))
        	<div class="alert alert-success">{{Session::get('flash_message')}}</div>
        @endif

        @if(Session::has('flash_error'))
        	<div class="alert alert-danger">{{Session::get('flash_error')}}</div>
        @endif

        @yield('content')
    </div>

</body>
</html>