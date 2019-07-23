<?php

require __DIR__ . '/_common.php';

use BasicApp\Blog\Models\BlogPostModel;
use BasicApp\Helpers\Url;

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$this->data['actionMenu'][] = [
	'url' => Url::returnUrl('admin/blog-post/create', [
		'link_user_id' => $parentId
	]),
	'label' => t('admin', 'Create'), 
	'icon' => 'fa fa-plus',
	'linkOptions' => [
		'class' => 'btn btn-success'
	]	
];

$adminTheme = service('adminTheme');

echo $adminTheme->table([
    'defaultRow' => BlogPostModel::createEntity(),
    'rows' => $elements,
    'columns' => function($model) {
        return [
            $this->createColumn(['attribute' => 'post_id'])->displaySmall()->number(),
            $this->createColumn(['attribute' => 'post_created_at'])->displayMedium(),
            $this->createColumn(['attribute' => 'post_lang']),
            $this->createColumn(['attribute' => 'post_slug']),
            $this->createColumn(['attribute' => 'post_title']),
            $this->createBooleanColumn(['attribute' => 'post_active']),
            $this->createUpdateLinkColumn(['action' => 'admin/blog-post/update']),
            $this->createDeleteLinkColumn(['action' => 'admin/blog-post/delete'])
        ];
    }
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}