<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Consignee extends Model
{
    use HasFactory, Nanoids,Notifiable, HasApiTokens;

    protected $fillable = [
        'profile_id',
        'factory_id',
        'affiliates_id',
        'customer_id',
        'customer_address_id',
        'prefix',
        'last_running_no',
        'is_active',
    ];
}
