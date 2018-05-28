<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'number', 'project_name','version','warehouse_id','specification','package',
        'step','special','HSF','batch','grade','packing','inventory_amount',
        'DIE_amount','manufacture_date','frozen','sale','manufacture',
        'first_entry_warehouse','attribute','remark'
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
        //return $this->belongsToMany(Warehouse::class)->withTimestamps();//,'product_warehouse','product_id','warehouse_id');
    }
}
