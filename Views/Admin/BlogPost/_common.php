<?php

use BasicApp\Helpers\Url;

$title = t('admin.menu', 'Blog');

$this->data['mainMenu']['blog']['active'] = true;

$this->data['breadcrumbs'][] = ['label' => t('admin.menu', 'Blog'), 'url' => Url::createUrl('/admin/blog-post')];

$this->data['title'] = $title;