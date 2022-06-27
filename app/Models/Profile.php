<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'user_id',
        'whs_id',
        'factory_id',
        'section_id',
        'position_id',
        'permission_id',
        'district_id',
        'company_id',
        'full_name',
        'address_1',
        'address_2',
        'zip_code',
        'exp_no',
        'mobile_no',
        'fax_no',
        'avatar_url',
        'description',
        'is_active',
    ];
}
