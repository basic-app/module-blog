<?php

$data->setMetaTags($this);

$theme = service('theme');

echo $theme->post([
	'title' => $data->post_title,
	'content' => $data->getText(),
	'created' => t('blog', 'Posted on {created}', ['{created}' => $data->getCreatedAsString()]),
]);?>