<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PalletPlacingTypeImage extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'pallet_placing_id',
        'image_url',
        'is_active',
    ];
}
