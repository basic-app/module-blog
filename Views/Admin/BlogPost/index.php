<?php

require __DIR__ . '/_common.php';

use BasicApp\Blog\Models\BlogPostModel;
use BasicApp\Helpers\Url;
use BasicApp\Blog\Config\BlogConfig;

$blogConfig = config(BlogConfig::class);

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

$labels = [
    BlogPostModel::label('post_id'),
    BlogPostModel::label('post_created_at'),
];

if ($blogConfig->multilanguage)
{
    $labels[] = BlogPostModel::label('post_lang');
}

$labels[] = BlogPostModel::label('post_slug');
$labels[] = BlogPostModel::label('post_title');
$labels[] = BlogPostModel::label('post_active');
$labels[] = '';
$labels[] = '';

echo $adminTheme->table([
    'labels' => $labels,
    'data' => $elements,
    'columns' => function($model) use ($blogConfig) {

        $return = [
            $this->createColumn(['attribute' => 'post_id'])->displaySmall()->number(),
            $this->createColumn(['attribute' => 'post_created_at'])->displayMedium(),
        ];

        if ($blogConfig->multilanguage)
        {
            $return[] =  $this->createColumn(['attribute' => 'post_lang']);
        }

        $return[] = $this->createColumn(['attribute' => 'post_slug']);
        $return[] = $this->createColumn(['attribute' => 'post_title']);
        $return[] = $this->createBooleanColumn(['attribute' => 'post_active']);
        $return[] = $this->createUpdateLinkColumn(['action' => 'admin/blog-post/update']);
        $return[] = $this->createDeleteLinkColumn(['action' => 'admin/blog-post/delete']);

        return $return;
    }
]);

if ($pager)
{
    echo $pager->links('default', 'adminTheme');
}