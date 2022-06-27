<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrderDetail extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'order_id',
        'order_plan_id',
        'revise_id',
        'ledger_id',
        'pono',
        'lotno',
        'order_month',
        'order_orgi',
        'order_round',
        'order_balqty',
        'order_stdpack',
        'shipped_flg',
        'shipped_qty',
        'sam_flg',
        'carrier_code',
        'bidrfl',
        'delete_flg',
        'reason_code',
        'firm_flg',
        'poupd_flg',
        'set_pallet_ctn',
        'revise_ctn',
        'is_active',
    ];
}
