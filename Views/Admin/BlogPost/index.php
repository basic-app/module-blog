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
	'linkAttributes' => [
		'class' => 'btn btn-success'
	]
];

$adminTheme = service('adminTheme');

echo $adminTheme->table([
    'labels' => [
        BlogPostModel::fieldLabel('post_id'),
        BlogPostModel::fieldLabel('post_created_at'),
        BlogPostModel::fieldLabel('post_slug'),
        BlogPostModel::fieldLabel('post_title'),
        BlogPostModel::fieldLabel('post_active'),
        '',
        ''
    ],
    'elements' => $elements,
    'columns' => function($model) {
        return [
            $this->createColumn(['field' => 'post_id'])->displaySmall()->number(),
            $this->createColumn(['field' => 'post_created_at'])->displayMedium(),
            $this->createColumn(['field' => 'post_slug'])->success(),
            $this->createColumn(['field' => 'post_title']),
            $this->createBooleanColumn(['field' => 'post_active']),
            $this->createUpdateLinkColumn(['action' => 'admin/blog-post/update']),
            $this->createDeleteLinkColumn(['action' => 'admin/blog-post/delete'])
        ];
    }
]);

if ($pager)
{
    echo $pager->links('default', 'adminTheme');
}