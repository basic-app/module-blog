<?php

echo admin_theme_widget('tableRow', [
    'columns' => [
        [
            'options' => ['class' => 'd-none d-sm-table-cell text-right', 'style' => 'width: 1%;'],
            'content' => $model->post_id
        ],
        [
            'options' => [
                'class' => 'd-none d-md-table-cell',
                'style' => 'white-space: nowrap;'
            ],
            'content' => date('Y-m-d', strtotime($model->post_created_at))
        ],
        [
            'options' => ['class' => 'process'],
            'content' => $model->post_slug
        ],
        [
            'content' => $model->post_title
        ],
        [
            'content' => $model->post_active ? t('admin', 'Yes') : t('admin', 'No')
        ],
        [
            'options' => ['style' => 'width: 1%; padding-left: 10px;'],
            'content' => admin_theme_widget('tableButtonUpdate', [
                'url' => classic_url('admin/blog-post/update', ['id' => $model->post_id]),
                'label' => t('admin', 'Update')
            ])
        ],
        [
            'options' => ['style' => 'width: 1%; padding-left: 10px; padding-right: 20px'],
            'content' => admin_theme_widget('tableButtonDelete', [
                'url' => classic_url('admin/blog-post/delete', ['id' => $model->post_id]),
                'label' => t('admin', 'Delete')
            ])
        ]
    ]
]);