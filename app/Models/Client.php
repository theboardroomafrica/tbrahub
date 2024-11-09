<?php

namespace App\Models;

use App\Notifications\ClientApprovedNotification;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function approveAccount()
    {
        // Generate and set a random password
        $password = Str::random(10);
        $this->password = Hash::make($password);
        $this->save();

        // Send the approval email with the password
        $this->notify(new ClientApprovedNotification($password));
    }
}
