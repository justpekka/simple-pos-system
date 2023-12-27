<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Supplier extends Model
{
    // use SoftDeletes;

    // protected static function boot() {
    //     static::creating(function ($model) {
    //         return $model->uuid = (string) Str::uuid();
    //     });
    // }

    public static function createUuid() { 
        $generated_uuid = substr(Str::uuid(), 0, 10);
        return $generated_uuid;
    }

    protected $table = "suppliers";
    protected $fillable = [
        "name", "brand_name", "phone_number"
    ];

    protected $hidden = [
        "id"
    ];
}
