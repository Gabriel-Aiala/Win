<?php

namespace App\Domains\Users\Models;

use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestidorType extends Authenticatable
{
    use Notifiable, HasApiTokens, HasFactory ,SoftDeletes;

    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'name',
        'risk',
    ];
}