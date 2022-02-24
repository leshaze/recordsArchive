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
                error_log($term);
                return Label::where('name', 'like', '%' . $request->input('term') . '%')->get();
            }
        }

        if ($request->search == 'title') {
            if ($term) {
                error_log($term);
                $terms = explode('_', $term);
                return Record::where('title', 'like', '%' . $terms[0] . '%')
                    ->where('artist_id', '=', $terms[1])
                    ->get();
            }
        }
        if ($request->search = 'country') {
            if ($term) {
                return Country::where('name', 'like', '%' . $term . '%')->get();
            }
        }
    }
}
