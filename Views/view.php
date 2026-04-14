<?php

$this->setVar('title', $data->post_title);
//$this->setVar('keywords', $data->post_keywords);
//$this->setVar('description', $data->post_description);

$this->extend('BasicApp\Site\layouts/app');

$this->section('content');

echo view_cell('Site::post', [
	'title' => $data->post_title,
    'description' => $data->post_description,
	'text' => $data->post_text,
    'created' => $data->getCreatedAsString()
]);

$this->endSection();