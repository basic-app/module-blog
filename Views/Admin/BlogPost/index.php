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

echo $adminTheme->grid([
    'headers' => [
        [
            'class' => $adminTheme::GRID_HEADER_PRIMARY_KEY,
            'content' => $model->getFieldLabel('post_id')
        ],
        $model->getFieldLabel('post_created_at'),
        [
            'class' => $adminTheme::GRID_HEADER_LABEL,
            'content' => $model->getFieldLabel('post_title')
        ],
        [
            'class' => $adminTheme::GRID_HEADER_MEDIUM,
            'content' => $model->getFieldLabel('post_slug')
        ],
        ['class' => $adminTheme::GRID_HEADER_BOOLEAN, 'content' => $model->getFieldLabel('post_active')],
        ['class' => $adminTheme::GRID_HEADER_BUTTON_UPDATE],
        ['class' => $adminTheme::GRID_HEADER_BUTTON_DELETE]
    ],
    'items' => function() use ($elements, $adminTheme) {

        foreach($elements as $data)
        {
            yield [
                $data->post_id,
                $data->post_created_at,
                $data->post_title,
                $data->post_slug,
                $data->post_active,
                ['url' => Url::returnUrl('admin/blog-post/update', ['id' => $data->post_id])],
                ['url' => Url::returnUrl('admin/blog-post/delete', ['id' => $data->post_id])]
            ];
        }
    }
]);

if ($pager)
{
    echo $pager->links('default', 'adminTheme');
}