<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable implements FilamentUser
{
    use HasFactory, HasUuids, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function growthStage()
    {
        return $this->belongsTo(GrowthStage::class);
    }
}
