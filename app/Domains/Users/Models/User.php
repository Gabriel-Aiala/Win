<?php

namespace App\Domains\Users\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Domains\Categories\Models\Category;
use App\Domains\Posts\Models\Post;
use App\Domains\Subscriptions\Models\Plan;
use App\Domains\Subscriptions\Models\Subscription;
use App\Domains\Subscriptions\Models\TaxRate;
use App\Domains\Transactions\Models\Transaction;
use App\Models\Subscriptions;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'whatsapp',
        'avatar',
        'created_at',
        'investidor_type_id',
        'sport_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}