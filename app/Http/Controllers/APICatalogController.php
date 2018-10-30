<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Movie::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $m = new Movie();

        $m->title = $request->input('title');
        $m->year = $request->input('year');
        $m->director = $request->input('director');
        $m->poster = $request->input('poster');
        $m->rented = $request->input('rented');
        $m->synopsis = $request->input('synopsis');
        $m->save();

        return response()->json(['error' => false, 'msg' => 'película guardada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $m = Movie::find($id);
        return response()->json($m);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $m = Movie::findOrFail($id);
        if(!is_null($request->input('title')))
           $m->title = $request->input('title');
        if(!is_null($request->input('year')))
           $m->year = $request->input('year');
        if(!is_null($request->input('director')))
           $m->director = $request->input('director');
        if(!is_null($request->input('synopsis')))
           $m->synopsis = $request->input('synopsis');
        if(!is_null($request->input('rented')))
           $m->rented = $request->input('rented');
        if(!is_null($request->input('poster')))
           $m->poster = $request->input('poster');
        $m->save();
        return response()->json(['error' => false, 'msg' => 'película actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $m = Movie::findOrFail($id);
        $m->delete();
        return response()->json(['error' => false, 'msg' => 'película eliminada']);
    }

    /**
     * Alquilar una pelicula
     */
    public function putRent($id) {
        $m = Movie::findOrFail($id);
        $m->rented = true;
        $m->save();
        return response()->json(['error' => false, 'msg' => 'película alquilada']);
    }

    /**
     * Devolver película
     */
    public function putReturn($id) {
        $m = Movie::findOrFail($id);
        $m->rented = false;
        $m->save();
        return response()->json(['error' => false, 'msg' => 'pelicula devuelta']);
    }
}
