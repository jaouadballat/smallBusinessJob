<?php


namespace App\Traits;


use Illuminate\Support\Str;

trait HasUUID
{

    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    /**
     * disable incrementing from model
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

}
