<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class InvoicePallet extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'invoice_id',
        'pallet_type_id',
        'pallet_placing_id',
        'pallet_no',
        'pallet_out_no',
        'pallet_total_ctn',
        'pallet_limit_ctn',
        'is_active',
    ];
}
