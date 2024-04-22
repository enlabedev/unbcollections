<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait HashesPassword
{
    public static function bootHashesPassword()
    {
        static::creating(function ($model) {
            if ($model->isDirty('password')) {
                $model->password = Hash::make($model->password);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('password')) {
                $model->password = Hash::make($model->password);
            }
        });
    }
}
?>