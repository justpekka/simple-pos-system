<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        "name", "product_uuid", "unit_uuid", "amount",
    ];

    protected $hidden = [
        "id"
    ];
    
    /**
     * Get the unit data.
     */
    public function unit()
    {
        return $this->hasMany('App\Unit');
    }
    
    /**
     * Get the product details data.
     */
    public function product()
    {
        return $this->belongsToMany('App\Product');
    }
}
