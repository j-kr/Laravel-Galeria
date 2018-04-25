@extends('master')

@section('content1')
    <div class="row">
        <div class="col-md-12">
            <br>
        <h1>Moje galerie</h1>
        </div>
    </div>
	
	<div class="row">
        <div class="col-md-12">

        	@if ($galleries->count() > 0 )
        		
                <table class="table table-striped table-bordered ">
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
	
	<div class="container ">
        <div class="container col-md-3">


			<form class="form" method="post" action="{{url('gallery/save')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
					<div class="form-group">
						<input type="text" name="gallery_name"
						id="gallery_name" placeholder="Nazwa galerii"
						class="form-control text-center" required />
					</div>
					
					<button class="btn btn-primary col-md ">     Zapisz     </button>
			</form>
        </div>
    </div>
@endsection