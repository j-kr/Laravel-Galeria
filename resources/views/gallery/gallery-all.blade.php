@extends('master')

@section('content1')
    <div class="row">
        <div class="col-md-12">
            <br>
        <h1>Wszystkie galerie</h1>
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
        					<td>{{$gallery->name}}
                                <span style="float: right;">
                                    Stworzone przez: {{$gallery->users['name']}}
                                </span>
                                <br>

                            </td>
							<td>
								<a href="{{url('gallery/view/' . $gallery->id)}}">Pokaż</a>
							</td>
        				</tr>
        				@endforeach
        			</tbody>
        		</table>
        	@endif
        </div>
@endsection