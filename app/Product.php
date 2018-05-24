<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'number', 'project_name','version','specification','package',
        'step','special','HSF','batch','grade','packing','inventory_amount',
        'DIE_amount','manufacture_date','frozen','sale','manufacture',
        'first_entry_warehouse','attribute','remark'
    ];

    public function warehouse()
    {
        return $this->belongsToMany('App\Warehouse','warehouse_product','product_id','warehouse_id');
    }
}
