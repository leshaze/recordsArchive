<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }
    public function label()
    {
        return $this->belongsTo('App\Models\Label');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
