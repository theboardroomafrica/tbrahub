<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSubscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function opportunityConnections()
    {
        return $this->hasMany(OpportunityConnection::class);
    }

    public function getRemainingCreditsAttribute()
    {
        return $this->credits_assigned - $this->credits_used;
    }

    public function getCreditsUsedAttribute()
    {
        return $this->opportunityConnections()->count();
    }
}
