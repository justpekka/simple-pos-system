<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        "name", "content",
    ];

    protected $hidden = [
        "id"
    ];
}
