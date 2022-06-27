<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class FileGedi extends Model
{
    use HasFactory, Nanoids, Notifiable, HasApiTokens;

    protected $fillable = [
        'mailbox_id',
        'batch_id',
        'file_size',
        'file_name',
        'file_path',
        'file_uploaded',
        'flag',
        'format',
        'originator',
        'is_downloaded',
        'is_active',
        'file_link',
    ];
}
