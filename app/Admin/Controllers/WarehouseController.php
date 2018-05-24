<?php

namespace App\Admin\Controllers;

use App\Warehouse;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Widgets\Table;

class WarehouseController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Warehouse::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('仓库名');
            $grid->responsible_man('负责人');
            $grid->responsible_phone('负责人联系方式');
            $grid->address("地址");
            $grid->column('expand','备注')->expand(function () {
                $profile = array_only($this->toArray(),['remarks']);//Product::select(['remark'])->get()->toArray();//array_only($this->profile, ['id']);
                return new Table([], $profile);
            }, 'Profile');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Warehouse::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','仓库名');
            $form->text('responsible_man','负责人');
            $form->mobile('responsible_phone','负责人联系方式');
            $form->text('address',"地址");
            $form->text('remarks','备注');
        });
    }
}
