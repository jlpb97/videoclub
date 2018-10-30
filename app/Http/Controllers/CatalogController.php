<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Krucas\Notification\Facades\Notification;

class CatalogController extends Controller
{
	public function getIndex() {
        $movies = Movie::all();
    	return view('catalog.index')->with('arrayPeliculas', $movies);
    }

    public function getShow($id) {
        $movie = Movie::findOrFail($id);
        return view('catalog.show')->with('pelicula', $movie);
    }

    public function putRent($id) {
        $movie = Movie::findOrFail($id);
        $movie->rented = true;
        $movie->save();
        Notification::success('Película alquilada');
        return redirect('/catalog/show/' . $id);
    }

    public function putReturn($id) {
        $movie = Movie::findOrFail($id);
        $movie->rented = false;
        $movie->save();
        Notification::success('Película devuelta');
        return redirect('/catalog/show/' . $id);
    }

    public function deleteMovie($id) {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        Notification::info('Película eliminada');
        return redirect('/catalog');
    }

    public function getCreate() {
    	return view('catalog.create');
    }

    public function postCreate(Request $request) {
        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        Notification::success('La película se ha guardado correctamente');
        return redirect('/catalog');
    }

    public function getEdit($id) {
        $movie = Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula' => $movie));
    }

    public function putEdit(Request $request, $id) {
        $movie = Movie::findOrFail($id);
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        Notification::success('La película se ha modificado correctamente');
        return redirect('/catalog/show/' . $id);
    }
}
