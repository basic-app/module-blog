<?php

$data->setMetaTags($this);

$theme = service('theme');

echo $theme->post([
	'title' => $data->post_title,
    'description' => $data->post_description,
	'text' => $data->getText(),
	'created' => t('blog', 'Posted on {created}', ['{created}' => $data->getCreatedAsString()]),
]);?>