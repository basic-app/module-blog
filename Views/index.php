<?php

use BasicApp\Page\Models\PageModel;

if (class_exists(PageModel::class))
{
    $page = PageModel::getPage('blog');

    if ($page)
    {
        $this->setVar('title', $page->page_title);
        //$this->setVar('keywords', $page->page_keywords);
        //$this->setVar('description', $page->page_description);
    }
}

$this->setVar('navMenuActiveItem', 'blog');

$this->extend('BasicApp\Site\layouts/app');

$this->section('content');

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

echo view_cell('Site::posts', [
    'posts' => $items,
    'pager' => $pager
]);

$this->endSection();