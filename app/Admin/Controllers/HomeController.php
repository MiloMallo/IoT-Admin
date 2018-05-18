<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\ChartDonut;
use Encore\Admin\Widgets\InfoBox;

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

            $content->header('Info box');
            $content->description('Description...');

            $content->row(function (Row $row) {
                $row->column(3, new InfoBox('New Users', 'users', 'aqua', '/demo/users', '1024'));
                $row->column(3, new InfoBox('New Orders', 'shopping-cart', 'green', '/demo/orders', '150%'));
                $row->column(3, new InfoBox('Articles', 'book', 'yellow', '/demo/articles', '2786'));
                $row->column(3, new InfoBox('Documents', 'file', 'red', '/demo/files', '698726'));

            });
            $content->row(function (Row $row) {
                $row->column(12, new ChartDonut('New Orders', 'shopping-cart', 'green', '/demo/orders', '150%'));
            });
        });
    }
}
