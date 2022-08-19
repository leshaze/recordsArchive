<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function price()
    {
        return $this->belongsTo(PriceHistory::class);
    }

    public function records()
    {
        return $this->hasMany(Records::class);
    }
}
