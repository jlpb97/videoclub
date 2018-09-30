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
		<form method="POST" style="display: inline-block;">
			{{ csrf_field() }}
			<input type="hidden" name="accion" value="{{ $pelicula->rented ? 'devolver' : 'alquilar'}}">
			<button type="submit" class="btn {{ $pelicula->rented ? 'btn-primary' : 'btn-success'}}">
				{{ $pelicula->rented ? 'Devolver película' : 'Alquilar película' }}
			</button>
		</form>
		<a href="{{ action('CatalogController@getEdit', $pelicula->id) }}"><button class="btn btn-warning">
			<i class="fa fa-pencil-square-o"></i>
			Editar película
		</button></a>
		<form method="POST" style="display: inline-block;">
			{{ csrf_field() }}
			<input type="hidden" name="accion" value="eliminar">
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