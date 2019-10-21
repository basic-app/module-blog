<?php

$items = [];

foreach($elements as $model)
{
    $items[] = [
        'title' => $model->post_title,
        'url' => $model->getUrl(),
        'created' => t('blog', 'Posted on {created}', ['{created}' => $model->getCreatedAsString()]),
        'description' => $model->post_description
    ];
}

$theme = service('theme');

echo $theme->posts(['items' => $items]);