<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'order_zone_type_id',
        'corrective_id',
        'commercial_id',
        'consignee_id',
        'shipping_id',
        'order_type_id',
        'etd_date',
        'order_group',
        'is_matched',
        'is_checked',
        'is_active',
    ];
}
