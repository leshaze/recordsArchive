<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use App\Models\Country;
use Illuminate\Http\Request;

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
                return Label::where('name', 'like', '%' . $request->input('term') . '%')->get();
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

        // if ($request->search == 'main') {
        //     $term = $request->term;
        //     //error_log($term);
        //     if ($term) {
                
        //         $records = Record::join('artists', 'records.artist_id', '=', 'artists.id')
        //             ->select('records.*')
        //             ->where('artists.name', 'like', '%' . $request->input('term') . '%')
        //             ->orderBy('release_date', 'ASC')
        //             ->get();
        //             error_log($records);
        //             return $records;
                
        //     }
        // }

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
