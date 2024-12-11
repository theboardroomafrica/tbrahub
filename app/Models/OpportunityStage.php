<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityStage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)->orderBy('sort');
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'stage_id');
    }

    public function applications()
    {
        return $this->hasMany(OpportunityApplication::class);
    }
}
