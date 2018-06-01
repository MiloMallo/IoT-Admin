<?php

namespace App\Admin\Controllers;

use App\Tag;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TagController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        //dd(!Admin::user()->roles()->where('id',1)->get()->isEmpty());
        //dd(Admin::user()->roles()->where('id',1)->get()->isEmpty());
        //dd(Admin::user()->roles()->where('id',2)->get());
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
        return Admin::grid(Tag::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->tagName('标签名');
            $grid->type('类型');
            $grid->created_at();
            $grid->updated_at();


            $grid->filter(function ($filter) {
                $filter->equal('tagName', '标签名')->select(Administrator::all()->pluck('name', 'id'));
                $filter->equal('type', 'User');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Tag::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('tagName', "标签名")->rules('required');
            $form->text('type', "类型")->rules('required');
            $form->display('created_at', trans('admin.created_at'));
            $form->display('updated_at', trans('admin.updated_at'));

        });
    }
}
