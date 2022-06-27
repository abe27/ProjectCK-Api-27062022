<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Receive extends Model
{
    use HasFactory, Nanoids, HasApiTokens, Notifiable;

    protected $fillable = [
        'file_gedi_id',
        'whs_id',
        'factory_id',
        'transfer_date',
        'transfer_no',
        'custom_office_no',
        'official_merge_no',
        'is_sync',
        'is_active',
    ];
}
