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

	@if (Auth::user()->id == $gallery->created_by)
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('image/do-upload') }}"
				class="dropzone" id="addImages" >
				
				{{ csrf_field() }}
				<input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
			</form>
		</div>
	</div>
	@endif
	<br><br>

	<h3>Komentarze</h3>

	@foreach ($gallery->comments as $comment)
	Ocena: {{ $comment->rate }}&nbsp Komentarz: {{ $comment->comment }}  <br>
	Dodane przez: {{ $comment->users['name']}}
	<hr>
	@endforeach

	@if (Auth::check())
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('gallery/add-comment') }}" method="post" >
				Dodaj komentarz:
				<input type="text" name="comment">
				Oceń:
				<select name="rate" id="rate">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
				

				{{ csrf_field() }}
				<input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
				<input type="submit" name="submit" value="Dodaj komentarz" class="btn btn-primary">
			</form>
		</div>
	</div>
	@endif

	<br>
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('/')}}" class="btn btn-primary">Wróć</a>
		</div>
	</div>
@endsection