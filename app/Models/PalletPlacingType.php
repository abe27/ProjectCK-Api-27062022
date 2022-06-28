<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PalletPlacingType extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'factory_id',
        'name',
        'description',
        'width',
        'length',
        'height',
        'per_pallet',
        'carton_size_width',
        'carton_size_length',
        'carton_size_height',
        'is_active',
    ];
}
