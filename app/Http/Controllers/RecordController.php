<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use App\Models\Country;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;

use function Psy\debug;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all Records from the database and return to view
        // $records = Record::all();
        $records = Record::join('artists', 'records.artist_id', '=', 'artists.id')
            ->select('records.*')
            ->orderBy('artists.name', 'ASC')
            ->paginate(10);
        return view('records.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordRequest $request)
    {
        $this->validate($request, [
            'artist_name' => 'required',
            'title' => 'required',
            'label_name' => 'required',
            'country_name' => 'max:4',
        ]);

        //Persist the record in the database
        //form data is available in the request object
        $record = new Record();
        //input method is used to get the value of input with its
        //name specified
        $record->kind = $request->input('kind');

        // Check if artist_id is in the current input request
        if (empty($request->input('artist_id'))) {
            // If not, try to get it from the database.
            $get_artist_id = Artist::where('name', '=', $request->input('artist_name'))->first();
            if (!$get_artist_id) {
                // If nothing is found in the database create a new artist and pass the new ID.
                $artist = new Artist();
                $artist->name = $request->input('artist_name');
                $artist->save(); //persist the data
                $get_artist_id = Artist::where('name', '=', $request->input('artist_name'))->first();
                $record->artist_id = $get_artist_id->id;
            } else {
                // If an artist is found in the DB get his ID and passt it on.
                $record->artist_id = $get_artist_id->id;
            }
        } else {
            // If an artist_id is proviced in the post request, just use it.
            $record->artist_id = $request->input('artist_id');
        }

        $record->title = $request->input('title');

        // Check if label_id is in the current input request
        if (empty($request->input('label_id'))) {
            // If not, try to get it from the database.
            $get_label_id = Label::where('name', '=', $request->input('label_name'))->first();
            if (!$get_label_id) {
                // If nothing is found in the database create a new label and pass the nw ID.
                $label = new Label();
                $label->name = $request->input('label_name');
                $label->save(); //persist the data
                $get_label_id = Label::where('name', '=', $request->input('label_name'))->first();
                $record->label_id = $get_label_id->id;
            } else {
                // If a label is found in the DB get his ID and pass it on.
                $record->label_id = $get_label_id->id;
            }
        } else {
            // If a label_id is provided in the post request, just use it
            $record->label_id = $request->input('label_id');
        }

        $record->catalog_number = $request->input('catalog_number');
        $record->matrix_number  = $request->input('matrix_number');
        $record->barcode        = $request->input('barcode');

        // Check if country_name is filled
        if (!empty($request->input('country_name'))) {
            // Check if country_id is in the current input request
            if (empty($request->input('country_id'))) {
                // If not, try to get it from the database.
                //dd($request->input());
                $get_country_id = Country::where('name', '=', $request->input('country_name'))->first();
                if (!$get_country_id) {
                    // If nothing is found in the database create a new label and pass the nw ID.
                    $country = new Country();
                    $country->name = $request->input('country_name');
                    $country->save(); //persist the data
                    $get_country_id = Country::where('name', '=', $request->input('country_name'))->first();
                    $record->country_id = $get_country_id->id;
                } else {
                    // If a country is found in the DB get his ID and pass it on.
                    $record->country_id = $get_country_id->id;
                }
            } else {
                // If a country_id is provided in the post request, just use it
                $record->country_id = $request->input('country_id');
            }
        }

        $record->release_date   = $request->input('release_date');
        $record->reissue_date   = $request->input('reissue_date');
        if (is_numeric($request->input('grading_media'))) {
            $record->grading_media  = $request->input('grading_media');
        }
        if (is_numeric($request->input('grading_cover'))) {
            $record->grading_cover  = $request->input('grading_cover');
        }
        if ($request->input('current_price') != NULL) {
            $checked_currentPrice = str_replace(',', '.', $request->input('current_price'));
            $record->current_price  = $checked_currentPrice;
        } else {
            $record->current_price  = $request->input('current_price');
        }
        if ($request->input('buy_price') != NULL) {
            $checked_buyPrice = str_replace(',', '.', $request->input('buy_price'));
            $record->buy_price      = $checked_buyPrice;
        } else {
            $record->buy_price      = $request->input('buy_price');
        }

        $record->archive_number = $request->input('archive_number');
        $record->note           = $request->input('note');

        $record->save(); //persist the data
        return redirect()->route('records.index')->with('info', 'Record ' . $record->title . ' von ' . $record->artist->name . ' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //Return view to create artist
        $record = Record::find($record->getOriginal('id'));
        //dd($records);
        return view('records.details', ['record' => $record]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //Find the artist
        $record = Record::find($record->getOriginal('id'));
        return view('records.edit', ['record' => $record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecordRequest  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecordRequest $request, Record $record)
    {
        // FIXME Check validate.
        $this->validate($request, [
            'artist_name' => 'required',
            'title' => 'required',
            'label_name' => 'required',
            'country_name' => 'max:4'
        ]);

        // Ermitteln ob Artist vorhanden ist oder geändert worden ist
        $get_artist_id = Artist::where('name', '=', $request->artist_name)->first();
        if (!$get_artist_id) {
            // If nothing is found in the database create a new artist and pass the new ID.
            $artist = new Artist();
            $artist->name = $request->artist_name;
            $artist->save(); //persist the data
            $get_artist_id = Artist::where('name', '=', $request->artist_name)->first();
            $record->artist_id = $get_artist_id->id;
        } 
        $record->artist_id = $get_artist_id->id;
        
        $record->title = $request->title;

        // Check if label_id is in the current input request
        $get_label_id = Label::where('name', '=', $request->label_name)->first();
        if (!$get_label_id) {
            // If nothing is found in the database create a new label and pass the nw ID.
            $label = new Label();
            $label->name = $request->label_name;
            $label->save(); //persist the data
            $get_label_id = Label::where('name', '=', $request->label_name)->first();
            $record->label_id = $get_label_id->id;
        } 
        $record->label_id = $get_label_id->id;

        $record->catalog_number = $request->catalog_number;
        $record->matrix_number  = $request->matrix_number;
        $record->barcode        = $request->barcode;

        // Check if country_name is filled
        if ($request->country_name) {
            // If not, try to get it from the database.
            $get_country_id = Country::where('name', '=', $request->country_name)->first();
            if (!$get_country_id) {
                // If nothing is found in the database create a new label and pass the nw ID.
                $country = new Country();
                $country->name = $request->input('country_name');
                $country->save(); //persist the data
                $get_country_id = Country::where('name', '=', $request->input('country_name'))->first();
                $record->country_id = $get_country_id->id;
            }
            $record->country_id = $get_country_id->id;
        }

        $record->release_date   = $request->release_date;
        $record->reissue_date   = $request->reissue_date;
        
        if( is_numeric($request->grading_media)) $record->grading_media = $request->grading_media;
        if(is_numeric($request->grading_cover)) $record->grading_cover  = $request->grading_cover; 
        $record->current_price  = ($request->current_price) ? str_replace(',', '.', $request->current_price) : $record->current_price = null;
        $record->buy_price  = ($request->buy_price) ? str_replace(',', '.', $request->buy_price) : $record->buy_price = null;
        $record->archive_number = $request->archive_number;
        $record->note           = $request->note;
        $sold = ($request->sold == "on") ? True : False;
        $record->sold = $sold;
        $sold_date = strtotime($request->sold_date);
        $record->sold_date = date('Y-m-d', $sold_date);
        $record->sold_to = $request->sold_to;
        // FIXME str_replace kontrollieren. Wieso klappt das nicht?
        $record->sold_price = $request->sold_price ? str_replace(',', '.', $request->sold_price) : $record->sold_price = null;
        $lost = ($request->lost == "on") ? True : False;
        $record->lost = $lost;
        dd($record);

        $record->save(); //persist the data
        return redirect()->route('records.index')->with('info', 'Record ' . $record->title . ' von ' . $record->artist->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //Retrieve the employee
        dd($record);
        $record = Record::find($record->getOriginal('id'));
        //delete
        $record->delete();
        return redirect()->route('records')->with('info', 'Record ' . $record->title . ' von ' . $record->artist->name . ' deleted successfully');
    }
}
