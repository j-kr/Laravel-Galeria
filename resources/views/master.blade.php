@extends('layouts.app')

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <meta name="csrf-token" content="{{ csrf_token() }}">

	

    <title>Galeria</title>
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