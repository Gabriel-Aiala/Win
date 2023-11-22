<?php

namespace App\Domains\Subscriptions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Plan extends Authenticatable
{

    use Notifiable, HasApiTokens, HasFactory;

    public $timestamps = false;
    protected $table = 'plans';
    protected $fillable = [
        'id',
        'name',
        'price',
        'sport_id'
    ];
}