<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number',30);
            $table->string('project_name',30);
            $table->string('version');
            $table->integer('warehouse_id');
            $table->string('specification');
            $table->string('package');
            $table->string('step',20);
            $table->string('special');
            $table->string('HSF');
            $table->string('batch');//批次
            $table->string('grade');//档次
            $table->string('packing');//包装
            $table->integer('inventory_amount');//库存数量
            $table->integer('DIE_amount');//DIE数
            $table->date('manufacture_date');//生产日期
            $table->boolean('frozen');//冻结
            $table->boolean('sale');//销售
            $table->boolean('manufacture');//生产
            $table->date('first_entry_warehouse');//首次入库
            $table->string('attribute');//属性
            $table->string('remark');//备注
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
