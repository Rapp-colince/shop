<?php

use Encore\Admin\Widgets\Table;

echo '<div><a class="btn btn-sm btn-success" href="' . route('admin.city.create') . '"><i class="fa fa-plus"></i> ' . trans('admin.create') . '</a></div>';

$headers = ['id',  trans('admin.name'), trans('admin.created_at'), trans('admin.updated_at'), ''];
$rows = [];

/** @var array $cities */
foreach ($cities as $city) {
    $rows[] = [
        $city['id'],
        $city['name'],
        $city['created_at'],
        $city['updated_at'],
        '<div>
            <a class="btn btn-sm btn-primary" href="' . route('admin.city.edit') . '"><i class="fa fa-edit"></i> ' . trans('admin.edit') . '</a>
            <a class="btn btn-sm btn-warning" href="' . route('admin.city.delete') . '"><i class="fa fa-remove"></i> ' . trans('admin.delete') . '</a>
        </div>',
    ];
}
$table = new Table($headers, $rows);
echo $table->render();
