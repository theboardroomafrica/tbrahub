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
use Laravel\Cashier\Billable;

class Client extends Authenticatable implements FilamentUser
{
    // TODO: think about upgrades vs downgrades — upgrade (rollover), downgrade lose
    use HasFactory, HasUuids, Notifiable, Billable;

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

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function subscriptionHistory()
    {
        return $this->hasMany(ClientSubscription::class);
    }

    public function activeSubscription()
    {
        return $this->subscriptions()->whereNull('ended_at')->latest('started_at')->first();
    }

    public function activePackage()
    {
        // TODO: to be updated. Have to determine which one is active. It shouldn't have expired
        $subscription = $this->activeSubscription();
        return $subscription ? $subscription->package : null;
    }

    public function getRemainingCreditsAttribute()
    {
        $subscription = $this->activeSubscription();
        return $subscription ? $subscription->remaining_credits : 0;
    }

    public function subscribeToPackage(Package $package)
    {
        // Create a Stripe checkout session
        $session = $this->newSubscription('default', $package->stripe_plan_id)->checkout([
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
            'metadata' => [
                'client_id' => $this->id, // Pass client_id as metadata
            ],
        ]);

        return $session->url;
    }

    public function logSubscription(Package $package)
    {
        // TODO: package duration to determine expiry
        ClientSubscription::create([
            'client_id' => $this->id,
            'package_id' => $package->id,
            'stripe_subscription_id' => $this->subscription('default')->stripe_id ?? null,
            'credits_assigned' => $package->default_credits,
            'started_at' => now(),
        ]);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ?: "https://res.cloudinary.com/dhhw72iwq/image/upload/v1734097957/marcia_uvkeft.jpg";
    }
}
