<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function applicationExperiences()
    {
        return $this->hasMany(OpportunityApplicationExperience::class, 'opportunity_experiences_id');
    }
}
