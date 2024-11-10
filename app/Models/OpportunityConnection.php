<?php

namespace App\Models;

use App\Notifications\ConnectionRequestNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OpportunityConnection extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class, 'opportunity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isPending()
    {
        return is_null($this->status);
    }

    public function isAccepted()
    {
        return $this->status === true;
    }

    public function isRejected()
    {
        return $this->status === false;
    }

    public function hasBeenContacted()
    {
        return !is_null($this->contacted_at);
    }

    public function getStatusTextAttribute()
    {
        if ($this->isPending()) return "Pending";
        if ($this->isAccepted()) return "Accepted";
        if ($this->isRejected()) return "Rejected";
    }

    public function clientSubscription()
    {
        return $this->belongsTo(ClientSubscription::class);
    }

    public function notifyUser()
    {
        $this->notify(new ConnectionRequestNotification());
    }

    public function routeNotificationForMail()
    {
        return $this->user->email;
    }
}
