<?php

use BasicApp\Site\Models\PageModel;

$page = PageModel::getPage('blog', true, ['page_name' => 'Blog']);

$page->setMetaTags($this);

$items = [];

foreach($elements as $model)
{
    $items[] = [
        'title' => $model->post_title,
        'url' => $model->url(),
        'created' => t('blog', 'Posted on {created}', ['{created}' => $model->createdAsString()]),
        'description' => $model->post_description
    ];
}

$theme = service('theme');

echo $theme->page([
    'title' => $page->page_name, 
    'text' => $page->page_text
]);

echo $theme->posts(['items' => $items]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}