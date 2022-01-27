<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use App\Models\Country;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index()
    {

    }

    public function show(Record $record)
    {

    }

    public function create()
    {

    }


    public function getAutocompleteSearch(Request $request){
        if($request->has('term')){
        return Artist::where('name','like','%'.$request->input('term').'%')->get();
        }
    }

    public function Search(Request $request) {
        $records = Record::join('artists', 'records.artist_id' , '=' , 'artists.id')
        ->select('records.*')
        ->where('artists.name', 'like', '%'.$request->input('term').'%')
        ->orderBy('release_date', 'ASC')
        ->get();
        //dd($records);
        return view('records.search',['term'=>$request->input('term'), 'records'=>$records]); 
    }

    public function getAutocompleteArtist(Request $request){
        if($request->has('term')){
            return Artist::where('name','like','%'.$request->input('term').'%')->get();
        }
    }

    public function getAutocompleteTitle(Request $request){
        if($request->has('term')){
            $terms = explode('_', $request->input('term'));
            return Record::where('title','like','%'.$terms[0].'%')
            ->where('artist_id', '=',$terms[1])
            ->get();
        }
    }

    public function getAutocompleteLabel(Request $request){
        if($request->has('term')){
            return Label::where('name','like','%'.$request->input('term').'%')->get();
        }
    }

    public function getAutocompleteCountry(Request $request){
        if($request->has('term')){
            return Country::where('name','like','%'.$request->input('term').'%')->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
