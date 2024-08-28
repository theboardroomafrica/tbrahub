<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityStage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'stage_id');
    }
}
