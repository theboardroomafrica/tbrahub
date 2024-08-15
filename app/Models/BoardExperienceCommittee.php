<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardExperienceCommittee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRoleAttribute()
    {
        return $this->chair ? "Chair" : "Member";
    }
}
