<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Invoice extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'order_id',
        'inv_prefix',
        'running_seq',
        'ship_date',
        'ship_from_id',
        'ship_via',
        'ship_der',
        'title_id',
        'loading_area',
        'privilege',
        'zone_code',
        'invoice_status',
        'references_id',
        'resend_gedi',
        'is_completed',
        'is_active',
    ];
}
