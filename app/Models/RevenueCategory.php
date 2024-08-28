<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'revenue_id');
    }
}
