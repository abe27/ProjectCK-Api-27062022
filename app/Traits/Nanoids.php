<?php

namespace App\Traits;

use Hidehalo\Nanoid\Client;

trait Nanoids
{
    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $client = new Client();
                $model->{$model->getKeyName()} = $client->generateId($size = 36, $mode = Client::MODE_DYNAMIC);
            }
        });
    }
    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
