<?php

namespace App\Admin\Controllers;

use App\Models\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;


class CityController extends AdminController
{

    protected $title = 'Города';
    protected $description = 'Справочник';

    /**
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new City());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __(trans('admin.name')))->sortable()->filter();
        $grid->column('created_at', __(trans('admin.created_at')))->sortable();
        $grid->column('updated_at', __(trans('admin.updated_at')))->sortable();

        return $grid;
    }


    /**
     * @param int $id
     * @return Show
     */
    protected function detail(int $id): Show
    {
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __(trans('admin.name')));
        $show->field('created_at', __(trans('admin.created_at')));
        $show->field('updated_at', __(trans('admin.updated_at')));

        return $show;
    }

    /**
     * @return Form
     */
    protected function form(): Form
    {
        Form::extend('map', Form\Field\Map::class);
        Form::extend('editor', Form\Field\Editor::class);
        $form = new Form(new City);

        $form->display('id', 'id');
        $form->text('name', trans('admin.names'))->rules(['required']);
        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }


}
