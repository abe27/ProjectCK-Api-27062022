<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ReceiveDetail extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'receive_id',
        'ledger_id',
        'plan_qty',
        'plan_ctn',
        'receive_plan_ctn',
        'is_completed',
        'is_active',
    ];
}
