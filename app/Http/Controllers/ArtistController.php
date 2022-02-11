<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Record;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

class ArtistController extends Controller
{
    /**
     * 
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all artists from the database and return to view
        $artists = Artist::paginate(10);
        return view('artists.index', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {
        //check the input
        $this->validate($request, [
            'name' => 'required'
        ]);

        $get_artist_id = Artist::where('name', '=', $request->input('name'))->first();
        if ($get_artist_id)
        {
            return redirect()->route('artists.create')->with('error', 'Artist '. $request->input('name') .' is already in the database.');
        }
        if (!$get_artist_id) {
            //Persist the record in the database
            //form data is available in the request object
            $artist = new Artist();
            //input method is used to get the value of input with its
            //name specified
            $artist->name = $request->input('name');
            $artist->description = $request->input('description');
            $artist->save(); //persist the data
            return redirect()->route('artists.create')->with('info', 'Artist ' . $request->input('name') . ' added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //Return view to detail artist
        $artist = Artist::find($artist->id);

        $records = Record::with(['artist'])->where('artist_id','=',$artist->id)->get();
        //dd($records);
        return view('artists.details', ['artist' => $artist, 'records' => $records]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistRequest  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
