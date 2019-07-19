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
    'rows' => $elements,
    'columns' => function($model) {

        if (!$model)
        {
            $model = BlogPostModel::createEntity();
        }

        return [
            $this->createColumn([
                'attribute' => 'post_id',
                'header' => $model->label('post_id')
            ])->displaySmall()->number(),
            $this->createColumn([
                'attribute' => 'post_created_at',
                'header' => $model->label('post_created_at')
            ])->displayMedium(),
            $this->createColumn([
                'attribute' => 'post_lang',
                'header' => $model->label('post_lang')
            ]),
            $this->createColumn([
                'attribute' => 'post_slug',
                'header' => $model->label('post_slug')
            ]),
            $this->createColumn([
                'attribute' => 'post_title',
                'header' => $model->label('post_title')
            ]),
            $this->createBooleanColumn([
                'attribute' => 'post_active',
                'header' => $model->label('post_active')
            ]),
            $this->createUpdateLinkColumn([
                'url' => Url::createUrl('admin/blog-post/update', ['id' => $model->getPrimaryKey()])
            ]),
            $this->createDeleteLinkColumn([
                'url' => Url::createUrl('admin/blog-post/delete', ['id' => $model->getPrimaryKey()])
            ])
        ];
    }
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}