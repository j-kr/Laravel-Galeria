@extends('layouts.app')

@section('content1')
<br>
	<div class="row">
		<div class="col-md-12">
			<h1>Edytuj dane konta</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action=" {{ url('user/do-edit/'. $user->id) }}" method="post">
				Imię i nazwisko:
				<input type="text" name="name_edit" value="{{ $user->name }}"><br><br>
				E-mail:
				<input type="text" name="email_edit" value="{{ $user->email }}"><br><br>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_users" value="{{ $user->id }}">
				<a href="{{ URL::previous()}}" class="btn btn-primary">Wróć</a>
				<input type="submit" name="submit" class="btn btn_primary" value="Edytuj">
		</div>
	</div>

@endsection