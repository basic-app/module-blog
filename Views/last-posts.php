<?php

$items = [];

foreach($elements as $model)
{
    $items[] = [
        'title' => $model->post_title,
        'url' => $model->url(),
        'created' => $model->createdAsString(),
        'description' => $model->post_description
    ];
}

echo theme_widget('posts', ['items' => $items]);