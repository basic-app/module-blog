<?php

$title = t('admin.menu', 'Blog');

$this->data['mainMenu']['blog']['active'] = true;

$this->data['breadcrumbs'][] = ['label' => t('admin.menu', 'Blog'), 'url' => site_url('/admin/blog-post')];

$this->data['title'] = $title;