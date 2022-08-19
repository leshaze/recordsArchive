<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use App\Models\Country;
use App\Models\PriceHistory;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all Records from the database and return to view
        // $records = Record::join('artists', 'records.artist_id', '=', 'artists.id')
        //     ->select('records.*')
        //     ->orderBy('artists.name', 'ASC')
        //     ->paginate(10);
        $records = Record::paginate(10);

        //dd($records);
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
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'buy_price' => 'numeric',
            'current_price' => 'numeric'
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
            $get_artist_id = Artist::firstOrCreate([
                'name' => $request->input('artist_name')
            ]);
            $record->artist_id = $get_artist_id->id;
        } else {
            // If an artist_id is proviced in the post request, just use it.
            $record->artist_id = $request->input('artist_id');
        }

        $record->title = $request->input('title');

        // Check if label_id is in the current input request
        if (empty($request->input('label_id'))) {
            // If not, try to get it from the database.
            $get_label_id = Label::firstOrCreate([
                'name' => $request->input('label_name')
            ]);
            $record->label_id = $get_label_id->id;
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
                $get_country_id = Country::firstorCreate([
                    'name' => $request->input('country_name')
                ]);
                $record->country_id = $get_country_id->id;
            } else {
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
        }
        if ($request->input('buy_price') != NULL) {
            $checked_buyPrice = str_replace(',', '.', $request->input('buy_price'));
            $record->buy_price      = $checked_buyPrice;
        }

        $record->archive_number = $request->input('archive_number');
        $record->note           = $request->input('note');

        $record->save(); //persist the data

        //save the image 
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->store('images', 'public');

                $image = new Image;
                $image->reference = 'record';
                $image->reference_id = $record->id;
                $image->name = $name;
                $image->path = $path;
                $image->save();
            };
        }
        //Save pricehistory
        if ($request->input('current_price') != NULL) {

            $pricehistory = new PriceHistory();
            $pricehistory->price = $checked_currentPrice;
            $pricehistory->record_id = $record->id;
            //$pricehistory->platform_id = '99';
            $pricehistory->save();

            //dd($pricehistory);
        }
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
        //Return view to show artist

        $record = Record::where('id', '=', $record->id)
            ->first();
        if ($record) {
            $images = Image::where('reference', '=', 'record')
                ->where('reference_id', '=', $record->id)
                ->get();
        }
        $prices = PriceHistory::where('record_id', '=', $record->id)->get();

        if (empty($record)) {
            return redirect()->route('records.index')->with('error', 'Invalid record');
        } else {
            return view('records.details', ['record' => $record, 'images' => $images, 'prices' => $prices]);
        }
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
        //$record = Record::where('id', '=', $record->id);

        $images = Image::where('reference', '=', 'record')
            ->where('reference_id', '=', $record->id)
            ->get();
        if (empty($record)) {
            return redirect()->route('records.index')->with('error', 'Invalid record');
        } else {
            return view('records.edit', ['record' => $record, 'images' => $images]);
        }
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
        $this->validate($request, [
            'artist_name' => 'required',
            'title' => 'required',
            'label_name' => 'required',
            'buy_price' => 'numeric',
            'current_price' => 'numeric'
        ]);

        // Ermitteln ob Artist vorhanden ist oder geändert worden ist
        $get_artist_id = Artist::firstOrCreate([
            'name' => $request->artist_name
        ]);
        $record->artist_id = $get_artist_id->id;

        $record->title = $request->title;

        // Check if label_id is in the current input request
        $get_label_id = Label::firstOrCreate([
            'name' => $request->label_name
        ]);
        $record->label_id = $get_label_id->id;

        $record->catalog_number = $request->catalog_number;
        $record->matrix_number  = $request->matrix_number;
        $record->barcode        = $request->barcode;

        // Check if country_name is filled
        if ($request->country_name) {
            // If not, try to get it from the database.
            $get_country_id = Country::firstOrCreate([
                'name' => $request->country_name
            ]);
            $record->country_id = $get_country_id->id;
        }

        $record->release_date   = $request->release_date;
        $record->reissue_date   = $request->reissue_date;

        if (is_numeric($request->grading_media)) $record->grading_media = $request->grading_media;
        if (is_numeric($request->grading_cover)) $record->grading_cover  = $request->grading_cover;
        if($record->current_price != $request->current_price) {
            //Save pricehistory
            $pricehistory = new PriceHistory();
            $pricehistory->price = str_replace(',', '.', $request->current_price);
            $pricehistory->record_id = $record->id;
            //$pricehistory->platform_id = '99';
            $pricehistory->save();
        }
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
        $record = Record::find($record->id);
        $images = Image::where('reference', '=', 'record')
            ->where('reference_id', '=', $record->id)
            ->get();

        foreach ($images as $image) {
            unlink(public_path() . '/storage/' . $image->path);
            $image->delete($image->name);
        }
        //delete
        $record->delete();
        return redirect()->route('records.index')->with('info', 'Record ' . $record->title . ' von ' . $record->artist->name . ' deleted successfully');
    }
}
