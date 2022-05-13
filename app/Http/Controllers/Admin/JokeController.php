<?php

namespace App\Http\Controllers\Admin;

use App\Models\joke;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\JokeRequest;

class JokeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.joke.index');
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
    public function store(JokeRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function show(joke $joke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function edit(joke $joke)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, joke $joke)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function destroy(joke $joke)
    {
        //
    }
}
