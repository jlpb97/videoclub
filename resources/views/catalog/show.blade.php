@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-sm-4">
	    <img src="{{ $pelicula['poster'] }}" style="width: 100%">
	</div>
	<div class="col-sm-8">
		<h1>{{ $pelicula->title }}</h1>
		<h3>Año: {{ $pelicula->year }}</h3>
		<h3 style="margin-bottom: 30px;">Director: {{ $pelicula->director }}</h3>
		<p>
			<b>Resumen: </b>{{ $pelicula->synopsis }}
		</p>
		<p>
			<b>Estado: </b>
			@if( !$pelicula->rented )
				Película disponible
			@else
				Película actualmente alquilada
			@endif
		</p>

		<form method="POST" action="{{ $pelicula->rented ? action('CatalogController@putReturn', $pelicula->id) : action('CatalogController@putRent', $pelicula->id) }}" style="display: inline-block;">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<button type="submit" class="btn {{ $pelicula->rented ? 'btn-primary' : 'btn-success'}}">
				{{ $pelicula->rented ? 'Devolver película' : 'Alquilar película' }}
			</button>
		</form>

		<a href="{{ action('CatalogController@getEdit', $pelicula->id) }}"><button class="btn btn-warning">
			<i class="fa fa-pencil-square-o"></i>
			Editar película
		</button></a>

		<form method="POST" action="{{ action('CatalogController@deleteMovie', $pelicula->id) }}" style="display: inline-block;">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<button type="submit" class="btn btn-danger">
				<i class="fa fa-trash"></i>
				Eliminar pelicula
			</button>
		</form>

		<a href="{{ action('CatalogController@getIndex') }}"><button class="btn btn-default">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
			Volver al listado
		</button></a>
	</div>
</div>

@stop