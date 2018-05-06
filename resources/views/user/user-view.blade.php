@extends('master')

@section('content1')
    <div class="row">
        <div class="col-md-12">
            <br>
        <h1>Moje konto</h1>
        </div>
    </div>
	
	<div class="row">
        <div class="col-md-12">
        	Imię i nazwisko: {{ $user->name }}<br>
        	E-mail: {{ $user->email }}<br><br>
        	<a href="{{ url('user/edit/'. $user->id) }}" class="btn btn_primary"> Edytuj</a>
        	
        </div>
    </div>

@endsection