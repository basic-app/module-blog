<?php

use BasicApp\Site\Models\PageModel;

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

if (class_exists(PageModel::class))
{
    $page = PageModel::getPage('blog', true, ['page_name' => 'Blog']);

    PageModel::setPageMetaTags($page, $this);

    echo $theme->page([
        'title' => $page->page_name,
        'text' => PageModel::pageText($page)
    ]);
}

echo $theme->posts(['items' => $items]);

if ($pager)
{
    echo $pager->links('default', 'theme');
}