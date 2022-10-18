<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use App\Models\Country;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getAutocomplete(Request $request)
    {

        $term = $request->term;
        if ($request->search == 'artist') {
            if ($term) {
                return Artist::where('name', 'like', '%' . $term . '%')->get();
            }
        }
        if ($request->search == 'label') {
            if ($term) {
                return Label::where('name', 'like', '%' . $term . '%')->get();
            }
        }

        if ($request->search == 'title') {
            if ($term) {
                $terms = explode('_', $term);
                return Record::where('title', 'like', '%' . $terms[0] . '%')
                    ->where('artist_id', '=', $terms[1])
                    ->get();
            }
        }

        if ($request->search == 'country') {
            if ($term) {
                return Country::where('name', 'like', '%' . $term . '%')->get();
            }
        }

        if ($request->search == 'platform') {
            if ($term) {
                return Platform::where('name', 'like', '%' . $term . '%')->get();
            }
        }

        if ($request->search == 'all') {
            error_log($request->input('term'));
            if ($term) {
                // $records = Record::where('title', 'like', '%' . $term . '%')
                // ->with('artist')
                // ->select('id', 'artist_id', DB::raw('title as name'), DB::raw('"record" as type'))
                // ->get();
                //$artists = Artist::where('name', 'like', '%' . $term . '%');

            //dd($records);
                
                
                $records = Record::query()
                    ->select('id', DB::raw('title as name'), 
                    DB::raw('"record" as type'))
                    ->where('title', 'like', '%' . $term . '%');
                $labels = Label::query()
                    ->select('id', 'name', DB::raw('"label" as type'))
                    ->where('name', 'like', '%' . $term .'%');    
                $query = Artist::query()
                    ->select('id', 'name', DB::raw('"artist" as type'))
                    ->where('name','like', '%' . $term . '%')
                    ->union($records)
                    ->union($labels)
                    ->get();
                error_log($query);

                
                // $labels = Label::where('name' , 'like', '%' . $term . '%')->get()
                //     ->select('records.*')
                //     ->where('artists.name', 'like', '%' . $request->input('term') . '%')
                //     ->orderBy('release_date', 'ASC');
                return $query;
                
            }
        }

        // public function Search(Request $request) {
        //     $records = Record::join('artists', 'records.artist_id' , '=' , 'artists.id')
        //     ->select('records.*')
        //     ->where('artists.name', 'like', '%'.$request->input('term').'%')
        //     ->orderBy('release_date', 'ASC')
        //     ->get();
        //     //dd($records);
        //     return view('record.search',['term'=>$request->input('term'), 'records'=>$records]); 
        // }

    }
}
