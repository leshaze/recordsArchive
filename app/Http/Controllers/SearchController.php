<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use App\Models\Country;
use App\Models\Platform;
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

        // if ($request->search == 'all') {
        //     //error_log($request->input('term'));
        //     if ($term) {
        //         $records = Record::where('title', 'like', '%' . $term . '%')->get();
        //         $artists = Artist::where('name', 'like', '%' . $term . '%')->get();
        //         $labels = Label::where('name' , 'like', '%' . $term . '%')->get();
        //             // ->select('records.*')
        //             // ->where('artists.name', 'like', '%' . $request->input('term') . '%')
        //             // ->orderBy('release_date', 'ASC')
        //         error_log($records);
        //         return [$records, $artists, $labels];
                
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
