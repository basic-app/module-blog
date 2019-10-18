<?php

$items = [];

foreach($elements as $data)
{
    $items[] = [
        'title' => $data->post_title,
        'url' => $data->getUrl(),
        'created' => t('blog', 'Posted on {created}', ['{created}' => $data->getCreatedAsString()]),
        'description' => $data->post_description
    ];
}

$theme = service('theme');

echo $theme->posts(['items' => $items]);

if ($pager)
{
    echo $pager->links('default', 'theme');
}