<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function boardExperiences()
    {
        return $this->belongsToMany(BoardExperience::class)
            ->withPivot('chair');
    }

    // Define an accessor to get the role name from the pivot
    public function getRoleAttribute()
    {
        return $this->pivot->chair ? 'Chair' : 'Member';
    }
}
