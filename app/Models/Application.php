<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function approve()
    {
        return $this->update(['status' => 1]);
    }

    public function markAsPending()
    {
        return $this->update(['status' => null]);
    }

    public function reject()
    {
        return $this->update(['status' => 0]);
    }

    public function getStatusTextAttribute()
    {
        if (is_null($this->status)) return "Pending";
        return $this->status ? "Approved" : "Rejected";
    }
}
