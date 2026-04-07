<?php

use BasicApp\Helpers\Url;

$title = t('admin.menu', 'Blog');

$this->tempData['mainMenu']['blog']['active'] = true;

$this->tempData['breadcrumbs'][] = ['label' => t('admin.menu', 'Blog'), 'url' => Url::createUrl('/admin/blog-post')];

$this->tempData['title'] = $title;