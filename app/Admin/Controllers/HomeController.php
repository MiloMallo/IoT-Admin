<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Warehouse;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\OperationLog;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\ChartDonut;
use Encore\Admin\Widgets\InfoBox;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            /*$content->header('Dashboard');
            $content->description('Description...');

            $content->row(Dashboard::title());

            $content->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });*/

            $content->header('数据图表');
            $content->description('实时分析...');

            $content->row(function (Row $row) {
                $userNum = (string)(Administrator::all()->count());
                $row->column(3, new InfoBox('New Users', 'users', 'aqua', '/admin/auth/users', $userNum));
                $warehouseNum = (string)(Warehouse::all()->count());
                $row->column(3, new InfoBox('New Orders', 'shopping-cart', 'green', '/admin/warehouses', $warehouseNum));
                $productNum = (string)(Product::all()->count());
                $row->column(3, new InfoBox('Articles', 'book', 'yellow', '/admin/products', $productNum));
                $logNum = (string)(OperationLog::all()->count());
                $row->column(3, new InfoBox('Documents', 'file', 'red', '/admin/auth/logs', $logNum));

            });
            $content->row(function (Row $row) {
                $row->column(12, new ChartDonut('New Orders', 'shopping-cart', 'green', '/demo/orders', '150%'));
            });
        });
    }
}
