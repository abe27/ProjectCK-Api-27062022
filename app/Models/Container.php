<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Container extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'container_type_id',
        'container_date',
        'container_no',
        'seal_no',
        'vessel',
        'loading_port',
        'container_enter_at',
        'container_release_at',
        'is_status',
        'is_active',
    ];
}
