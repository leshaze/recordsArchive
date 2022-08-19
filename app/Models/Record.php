<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
    public function label()
    {
        return $this->belongsTo(Label::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function prices()
    {
        return $this->hasMany(PriceHistory::class);
    }
    
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
