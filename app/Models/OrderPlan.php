<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrderPlan extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'file_gedi_id',
        'vendor',
        'cd',
        'unit',
        'whs',
        'tagrp',
        'factory',
        'sortg1',
        'sortg2',
        'sortg3',
        'plantype',
        'pono',
        'biac',
        'shiptype',
        'etdtap',
        'partno',
        'partname',
        'pc',
        'commercial',
        'sampleflg',
        'orderorgi',
        'orderround',
        'firmflg',
        'shippedflg',
        'shippedqty',
        'ordermonth',
        'balqty',
        'bidrfl',
        'deleteflg',
        'ordertype',
        'reasoncd',
        'upddte',
        'updtime',
        'carriercode',
        'bioabt',
        'bicomd',
        'bistdp',
        'binewt',
        'bigrwt',
        'bishpc',
        'biivpx',
        'bisafn',
        'biwidt',
        'bihigh',
        'bileng',
        'lotno',
        'minimum',
        'maximum',
        'picshelfbin',
        'stkshelfbin',
        'ovsshelfbin',
        'picshelfbasicqty',
        'outerpcs',
        'allocateqty',
        'running_seq',
        'order_group',
        'is_planing',
        'is_generated',
        'is_invoice',
        'is_sync',
        'is_active',
    ];
}
