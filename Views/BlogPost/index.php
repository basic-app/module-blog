<?php

use BasicApp\Page\Models\PageModel;

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

echo $theme->posts(['items' => $items]);

if ($pager)
{
    echo $pager->links('default', 'theme');
}