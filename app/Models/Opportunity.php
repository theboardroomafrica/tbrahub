<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(OpportunityType::class, 'type_id');
    }

    public function stage()
    {
        return $this->belongsTo(OpportunityStage::class, 'stage_id');
    }

    public function revenue()
    {
        return $this->belongsTo(RevenueCategory::class, 'revenue_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
