<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityExperience extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
