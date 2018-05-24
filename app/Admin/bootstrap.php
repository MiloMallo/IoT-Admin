<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

//Encore\Admin\Form::forget(['map', 'editor']);
use App\Admin\Extensions\Column\ExpandRow;
use App\Admin\Extensions\Column\OpenMap;
use App\Admin\Extensions\Column\FloatBar;
use App\Admin\Extensions\Column\Qrcode;
use App\Admin\Extensions\Column\UrlWrapper;
use App\Admin\Extensions\Form\WangEditor;
use App\Admin\Extensions\Nav\Links;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid\Column;

Form::forget(['map', 'editor']);

Form::extend('editor', WangEditor::class);

Admin::css('/vendor/prism/prism.css');
Admin::js('/vendor/prism/prism.js');
Admin::js('/vendor/clipboard/dist/clipboard.min.js');

Column::extend('expand', ExpandRow::class);
Column::extend('openMap', OpenMap::class);
Column::extend('floatBar', FloatBar::class);
Column::extend('qrcode', Qrcode::class);
Column::extend('urlWrapper', UrlWrapper::class);
Column::extend('action', Grid\Displayers\Actions::class);