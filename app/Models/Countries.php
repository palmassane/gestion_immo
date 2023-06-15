<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Countries extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function location(){
        return $this->hasMany(Location::class);
    }
}
