<?php

require __DIR__ . '/_common.php';

use BasicApp\Blog\Models\BlogPostModel;

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$this->data['actionMenu'][] = [
	'url' => classic_url('admin/blog-post/create', [
		'returnUrl' => classic_uri_string(),
		'link_user_id' => $parentId
	]),
	'label' => 'Add Post', 
	'icon' => 'plus',
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