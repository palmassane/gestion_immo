<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function countries() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function region() {
        return $this->belongsTo(Region::class, 'region_id');
    }
}