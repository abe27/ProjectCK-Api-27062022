<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ledgers extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'tap_group_id',
        'whs_id',
        'factory_id',
        'part_type_id',
        'part_id',
        'kind_id',
        'size_id',
        'color_id',
        'width',
        'length',
        'gross_weight',
        'net_weight',
        'is_active'
    ];
}
