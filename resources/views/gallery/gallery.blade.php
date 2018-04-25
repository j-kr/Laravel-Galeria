@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
        <h1>Moje galerie</h1>
        </div>
    </div>
	
	<div class="row">
        <div class="col-md-8">
        	@if ($galleries->count() > 0 )
        		<table class="table table-striped table-bordered table-responsive">
        			<thead>

        				<tr class="info">
        					<th>Nazwa galerii</th>
        					<th></th>
        				</tr>
        			</thead>

        			<tbody>
        				@foreach ($galleries as $gallery)
        				<tr>
        					<td>{{$gallery->name}}</td>
        					<td><a href="{{url('gallery/view/' . $gallery->id)}}"> Wyświetl</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
        		@endif
        </div>
	
	<div class="row">
        <div class="col-md-4">
			<form class="form" method="post" action="{{url('gallery/save')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
					<div class="form-group">
						<input type="text" name="gallery_name"
						id="gallery_name" placeholder="Nazwa galerii"
						class="form-control"/>
					</div>
					
					<button class="btn btn-primary">Zapisz</button>
			</form>
        </div>
    </div>
@endsection