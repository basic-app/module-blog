<?php

require __DIR__ . '/_common.php';

use BasicApp\Blog\Models\BlogPostModel;
use BasicApp\Helpers\Url;

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$this->data['actionMenu'][] = [
	'url' => Url::returnUrl('admin/blog-post/create', [
		'link_user_id' => $parentId
	]),
	'label' => 'Add Post', 
	'icon' => 'fa fa-plus',
	'linkOptions' => [
		'class' => 'btn btn-success'
	]	
];

$rows = [];

foreach($elements as $model)
{
    $rows[] = app_view('BasicApp\Blog\Admin\BlogPost\index-row', ['model' => $model]);
}

echo admin_theme_widget('table', [
    'head' => [
        'columns' => [
            ['content' => '#', 'options' => ['class' => 'd-none d-sm-table-cell']],
            ['content' => BlogPostModel::label('post_created_at'), 'options' => ['class' => 'd-none d-md-table-cell']],
            ['content' => BlogPostModel::label('post_lang')],
            ['content' => BlogPostModel::label('post_slug')],
            ['content' => BlogPostModel::label('post_title')],
            ['content' => BlogPostModel::label('post_active')],
            ['options' => ['colspan' => 2]]
        ]
    ],
    'rows' => $rows
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}