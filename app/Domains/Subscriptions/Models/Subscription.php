<?php

namespace App\Domains\Subscriptions\Models;

use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Subscription extends Authenticatable
{
    use Notifiable, HasApiTokens, HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'user_id',
        'plan_id',
        'cancelled',
        'last_payment',
        'created_at',
    ];
}