<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
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

    /**
     * Get the Supplier that owns the products.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
