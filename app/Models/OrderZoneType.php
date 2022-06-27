<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrderZoneType extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'factory_id',
        'zone_id',
        'zone_name',
        'description',
        'is_active',
    ];
}
