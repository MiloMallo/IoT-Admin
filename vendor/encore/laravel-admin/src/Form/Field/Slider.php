<?php

namespace Encore\Admin\Form\Field;

use Encore\Admin\Form\Field;

class Slider extends Field
{
    protected static $css = [
        '/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.css',
        '/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.skinNice.css',
    ];

    protected static $js = [
        '/vendor/laravel-admin/AdminLTE/plugins/ionslider/ion.rangeSlider.min.js',
    ];
    protected $options;
    public function __construct($column, $arguments = [])
    {
        $this->column = $column;
        $this->label = $this->formatLabel($arguments);
        $this->id = $this->formatId($column);

        $this->options = [
            'type'     => 'single',
            'prettify' => false,
            'hasGrid'  => true,
            'min'   => (int)$arguments[0],
            'from'  => (int)$arguments[1],
            'max'  => (int)$arguments[2]
        ];
    }

    public function render()
    {
        $option = json_encode($this->options);

        $this->script = "$('{$this->getElementClassSelector()}').ionRangeSlider($option)";

        return parent::render();
    }
}
