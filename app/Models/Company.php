<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Model
{
    use HasFactory, Nanoids, HasApiTokens, Notifiable;

    protected $fillable = [
        'district_id',
        'company_name',
        'contact_name',
        'address_1',
        'address_2',
        'zip_code',
        'tel_no',
        'fax_no',
        'company_log_url',
        'description',
        'is_active',
    ];
}
