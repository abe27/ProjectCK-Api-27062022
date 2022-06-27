<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UnitType extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];
}
