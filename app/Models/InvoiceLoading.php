<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class InvoiceLoading extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'whs_id',
        'factory_id',
        'shipping_id',
        'name',
        'description',
        'is_active',
    ];

    public function whs() {
        return $this->hasMany(Whs::class, 'id', 'whs_id');
    }

    public function factory() {
        return $this->hasMany(Factory::class, 'id', 'factory_id');
    }

    public function shipping() {
        return $this->hasMany(ShippingType::class, 'id', 'shipping_id');
    }
}
