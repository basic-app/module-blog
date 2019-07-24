<?php

$model->setMetaTags($this);

$theme = service('theme');

echo $theme->post([
	'title' => $model->post_title,
	'text' => $model->text(),
	'created' => t('blog', 'Posted on {created}', ['{created}' => $model->createdAsString()]),
]);?>