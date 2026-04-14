<?php

$items = [];

foreach($elements as $model)
{
    $items[] = [
        'title' => $model->post_title,
        'url' => $model->getUrl(),
        'created' => t('blog', 'Posted on {created}', ['{created}' => $model->getCreatedAsString()]),
        'keywords' => $model->post_keywords,
        'description' => $model->post_description
    ];
}

echo view_cell('Site::posts', $items);