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
			<div id="gallery-images">
				<ul>
					@foreach ($gallery->images as $image)
					<li>
						<a href="{{ url($image->file_path) }}" data-lightbox="mygallery">
							<img src="{{ url($image->file_path) }}">
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>


	<br>
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('gallery/list')}}" class="btn btn-primary">Wróć</a>
		</div>
	</div>
@endsection