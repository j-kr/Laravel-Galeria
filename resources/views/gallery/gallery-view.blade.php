@extends('master')

@section('content1')
<br>
	<div class="row">
		<div class="col-md-12">
			<h1>{{$gallery->name}}</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<a href="{{url('gallery/list')}}" class="btn btn-primary">Wróć</a>
		</div>
	</div>
@endsection