<?php

namespace App\Http\Controllers\Admin;

use App\Models\Joke;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JokeRequest;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class JokeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $jokes = Joke::latest()->paginate(5);
        return view('admin.joke.index',compact('jokes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\JokeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JokeRequest $request)
    {
        try{
            Joke::insert([
                'joke_title' => $request->joke_title,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success','New joke has been inserted Successfully');
        }catch(\Exception $e){
            // throw new Exception($e->getMessage()) ;
            Log::info('Joke Store Error: '.$e->getMessage());
            return back()->with('error','New joke insertion failed !!!');
        }
    }
    
}
