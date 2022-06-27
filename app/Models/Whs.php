<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Whs extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'whs_type_id',
        'name',
        'description',
        'is_active',
    ];
}
