<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function dashboard()
    {
        //Show all Records from the database and return to view
        $count = Record::all()->count();
        $total_value = Record::all()->sum('current_price');
        $count_lp = Record::where('kind', '=', 'LP')->count();
        $count_cd = Record::where('kind', '=', 'CD')->count();
        $count_artist = Artist::all()->count();
        $count_label = Label::all()->count();
        return view('home', ['count'=>$count, 'total_value'=>$total_value, 'count_lp'=>$count_lp, 'count_cd'=>$count_cd, 'count_artist'=>$count_artist, 'count_label'=>$count_label]);
    }

    public function index()
    {
        //Show all Records from the database and return to view
        //$records = Record::all();
        $records = Record::join('artists', 'records.artist_id' , '=' , 'artists.id')
        ->select('records.*')
        ->orderBy('artists.name', 'ASC')
        ->paginate(10);
        return view('records.index',['records'=>$records]);
    }
}
