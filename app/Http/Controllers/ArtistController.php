<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Artist;
use App\Models\Record;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all artists from the database and return to view
        $artists = Artist::paginate(20);
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
            'artist_name' => 'required'
        ]);

        $get_artist_id = Artist::where('name', '=', $request->input('artist_name'))->first();
        if ($get_artist_id) {
            return redirect()->route('artists.create')->with('error', 'Artist ' . $request->input('name') . ' is already in the database.');
        }
        if (!$get_artist_id) {
            //Persist the record in the database
            //form data is available in the request object
            $artist = new Artist();
            //input method is used to get the value of input with its
            //name specified
            $artist->name = $request->input('artist_name');
            $artist->description = $request->input('description');
            $artist->save(); //persist the data

            //save the image 
            if ($request->hasFile('file')) {
                $files = $request->file('file');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $path = $file->store('images', 'public');

                    $save = new Image;
                    $save->reference = 'artist';
                    $save->reference_id = $artist->id;
                    $save->name = $name;
                    $save->path = $path;
                    $save->save();
                };
            }
            return redirect()->route('artists.create')->with('info', 'Artist ' . $request->input('name') . ' added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //Return view to detail artist
        $artist = Artist::find($artist->id);

        $records = Record::with(['artist'])->where('artist_id', '=', $artist->id)->get();

        $images = Image::where('reference', '=', 'artist')
            ->where('reference_id', '=', $artist->id)
            ->get();
        //dd($records);
        return view('artists.details', ['artist' => $artist, 'records' => $records, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {

        //Find the atist
        //$label = Artist::where('id', '=', $artist->id)->first();
        $images = Image::where('reference', '=', 'artist')
            ->where('reference_id', '=', $artist->id)
            ->get();
        if (empty($artist)) {
            return redirect()->route('artists.index')->with('error', 'Invalid artist');
        } else {
            return view('artists.edit', ['artist' => $artist, 'images' => $images]);
        }
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
        $this->validate($request, [
            'artist_name' => 'required'
        ]);

        $artist->id = $request->id;
        $artist->name = $request->artist_name;
        $artist->description = $request->description;

        $artist->save();

        return redirect()->route('labels.index')->with('info', 'Artist ' . $artist->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //Retrieve the employee
        $artist = Artist::find($artist->id);
        $result = Record::where('artist_id', '=', $artist->id)->first();
        if (!$result) {
            $images = Image::where('reference', '=', 'artist')
                ->where('reference_id', '=', $artist->id)
                ->get();

            foreach ($images as $image) {
                unlink(public_path() . '/storage/' . $image->path);
                $image->delete($image->name);
            }
            //delete
            $artist->delete();
            return redirect()->route('artists.index')->with('info', 'Artist ' . $artist->name . ' deleted successfully');
        } else {
            return redirect()->route('artists.index')->with('error', 'Artist ' . $artist->name . ' could not be deleted. ');
        }
    }

    public function print(Artist $artist)
    {
        //Find the label        
        //Return view to detail artist

        $records = Record::with(['artist'])->where('artist_id', '=', $artist->id)
            ->orderBy('name', 'ASC')
            ->get();

        $total_value = $records->sum('current_price');
        return view('artists.print', ['artist' => $artist, 'records' => $records, 'total_value' => $total_value]);
    }
}
