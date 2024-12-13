<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected $casts = ['deadline' => 'date'];

    public function type()
    {
        return $this->belongsTo(OpportunityType::class, 'type_id');
    }

    public function revenue()
    {
        return $this->belongsTo(RevenueCategory::class, 'revenue_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function applications()
    {
        return $this->hasMany(OpportunityApplication::class, 'opportunity_id');
    }

    public function connections()
    {
        return $this->hasMany(OpportunityConnection::class);
    }

    public function getDeadlineDaysAttribute()
    {
        $diff = ceil(now()->diffInDays($this->deadline));
        return $this->deadline->isFuture() ? $diff . ' days more' : $diff . ' days ago';
    }

    public function opportunityExperiences()
    {
        return $this->hasMany(OpportunityExperience::class);
    }
}
