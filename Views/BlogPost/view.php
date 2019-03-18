<?php

$model->setMetaTags();

echo theme_widget('post', [
	'title' => $model->post_title,
	'text' => $model->text(),
	'created' => 'Posted on ' . $model->createdAsString()
]);?>