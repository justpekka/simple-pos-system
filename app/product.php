<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        "name", "supplier_uuid",
    ];

    protected $hidden = [
        "id"
    ];
    
    /**
     * Get the supplier owner's data.
     */
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
    
    /**
     * Get the product stock data.
     */
    public function stock()
    {
        return $this->hasMany('App\Stock');
    }
}
