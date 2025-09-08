<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'location_id', 'status'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
