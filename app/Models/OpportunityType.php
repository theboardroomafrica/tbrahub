<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'type_id');
    }
}
