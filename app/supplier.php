<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    // use SoftDeletes;

    // protected static function boot() {
    //     static::creating(function ($model) {
    //         return $model->uuid = (string) Str::uuid();
    //     });
    // }

    protected $table = 'suppliers';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        "name", "brand_name", "phone_number"
    ];

    protected $hidden = [
        "id"
    ];
}
