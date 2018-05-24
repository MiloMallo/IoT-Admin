<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = [
        'name', 'responsible_man','responsible_phone','address','remarks'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product','warehouse_product','warehouse_id','product_id');
    }
}
