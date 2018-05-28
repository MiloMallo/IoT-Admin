<?php

namespace App\Admin\Controllers;

use App\Product;

use App\Warehouse;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */

    public function index()
    {
/*        $profile = array_only(Product::first()->toArray(),['remark']);//Product::select(['remark'])->get()->toArray();//array_only($this->profile, ['id']);
        $kname = array('备注');

        array_walk($profile,function (&$v,$k,$kname){
            $v = array_combine($kname,array_slice($v,1,-1));
        },$kname);
        dd($profile);*/
        //$profile = array_only(Product::first()->toArray(),['attribute','remark']);
        //dd($profile);
        /*$warehouses = Warehouse::select('id','name')->get()->toArray();
        dd($warehouses);*/
        return Admin::content(function (Content $content) {

            $content->header('产品管理');
            $content->description('芯片库存');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->number('编号');
            $grid->column('warehouse.name','仓库名')->sortable();
            $grid->project_name('项目名')->editable();
            $grid->version('版本');
            $grid->specification('规格');
            $grid->package('封装');
            $grid->step('阶段')->label();
            $grid->special('特殊');
            $grid->HSF('HSF');
            $grid->batch('批次');
            $grid->grade('档次');
            $grid->packing('包装');
            $grid->inventory_amount('库存量');
            $grid->DIE_amount('DIE数');
            $grid->manufacture_date('生产日期');
            $grid->frozen('冻结');
            $grid->sale('销售');
            $grid->manufacture('生产');
            $grid->first_entry_warehouse('首次入库');
            $grid->column('expand','备注')->expand(function () {
                $profile = array_only($this->toArray(),['attribute','remark']);//Product::select(['remark'])->get()->toArray();//array_only($this->profile, ['id']);
                return new Table([], $profile);
            }, 'Profile');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form1()
    {
        return Admin::form(Product::class, function (Form $form) {

            $form->tab('基本信息', function (Form $form) {

                $form->display('id','ID');
                $form->text('number','产品编号')->rules('required');
                $form->text('project_name','项目名');
                $form->text('version','版本');
                $form->display('created_at','创建日期');
                $form->display('updated_at','更新日期');

            })->tab('当前状态', function (Form $form) {
                $form->text('specification');
                $form->text('package');
                $form->text('step');
                $form->text('HSF');
                $form->date('manufacture_date');
            })->tab('备注', function (Form $form) {
                $form->text('remark');
            });
        });
    }
    protected function form()
    {
        return Admin::form(Product::class, function (Form $form) {

            $form->tab('基本信息', function (Form $form) {
                $form->text('number','产品编号')->rules('required');
                $form->text('project_name','项目名')->rules('required');
                $form->text('version','版本')->rules('required');
                $form->text('specification')->rules('required');
                $form->text('package')->rules('required');
                $form->select('step')->options([
                    1 => '晶圆',
                    2 => '半成品',
                    3 => '成品',
                ])->rules('required');
                //$form->select('warehouses', '仓库')->options(Warehouse::all()->pluck('name', 'id'))->rules('required');
                $form->number('warehouse_id','仓库')->rules('required');//$warehouses = [1 => 'rxIuF5CJmA',2=> 'vFGyK0pNeE'];//Warehouse::select('id','name')->get()->toJson();//array_only(Warehouse::all()->toArray(),['id','name']);//Product::select(['remark'])->get()->toArray();//array_only($this->profile, ['id']);
                //$form->select('warehouse_id','仓库')->options(Warehouse::all()->pluck('name', 'id'));
            })->tab('当前状态', function (Form $form) {
                $form->text('HSF')->rules('required');
                $form->text('special','特殊')->rules('required');
                $form->text('batch','批次')->rules('required');
                $form->text('grade','档次')->rules('required');
                $form->text('packing','包装')->rules('required');
                $form->number('inventory_amount','库存数量')->default(0)->rules('required');
                $form->number('DIE_amount','DIE数量')->default(0)->rules('required');
                $form->date('manufacture_date','生产日期')->default('now')->rules('required');
                $form->switch('frozen','冻结')->default(false)->rules('required');
                $form->switch('sale','销售')->default(false)->rules('required');
                $form->switch('manufacture','生产')->rules('required');
                $form->date('first_entry_warehouse','首次入库')->default('now')->rules('required');
            })->tab('备注', function (Form $form) {
                $form->text('attribute','属性')->rules('required');
                $form->text('remark','备注')->rules('required');
            });
        });
    }
}
