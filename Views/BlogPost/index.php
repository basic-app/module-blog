<?php

use BasicApp\Site\Models\PageModel;

$items = [];

foreach($elements as $model)
{
	$items[] = [
		'title' => $model->post_title,
		'url' => $model->url(),
		'created' => 'Posted on ' . $model->createdAsString(),
		'description' => $model->post_description
	];
}

$page = PageModel::getPage('blog', true, ['page_name' => 'Blog']);

$page->setMetaTags();

echo theme_widget('page', [
    'title' => $page->page_name, 
    'text' => $page->page_text
]);

echo theme_widget('posts', ['items' => $items]);

echo $pager->links('default', 'bootstrap4');