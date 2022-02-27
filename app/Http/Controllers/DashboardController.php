<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Artist;
use App\Models\Record;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        //Show all Records from the database and return to view
        if (AUTH::user()->role_id == 1) {
            $count = Record::all()->count();
            $total_value = Record::all()->sum('current_price');
            $count_lp = Record::where('kind', '=', 'LP')->count();
            $count_cd = Record::where('kind', '=', 'CD')->count();
        } else {
            $count = Record::where('user_id', '=', AUTH::user()->id)->count();
            $total_value = Record::where('user_id', '=', AUTH::user()->id)->sum('current_price');
            $count_lp = Record::where('kind', '=', 'LP')->where('user_id', '=', AUTH::user()->id)->count();
            $count_cd = Record::where('kind', '=', 'CD')->where('user_id', '=', AUTH::user()->id)->count();
        }
        $count_artist = Artist::all()->count();
        $count_label = Label::all()->count();

        return view('dashboard', ['count' => $count, 'total_value' => $total_value, 'count_lp' => $count_lp, 'count_cd' => $count_cd, 'count_artist' => $count_artist, 'count_label' => $count_label]);
    }
}
