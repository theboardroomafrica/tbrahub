<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardPosition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function boardExperiences()
    {
        return $this->hasMany(BoardExperience::class, 'position_id');
    }
}
