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
        return $this->hasMany(Product::class);
        //return $this->belongsToMany(Product::class)->withTimestamps();//,'product_warehouse','warehouse_id','product_id');
    }
}
