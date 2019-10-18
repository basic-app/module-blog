<?php

use BasicApp\Helpers\Url;
use BasicApp\Admin\AdminEvents;
use BasicApp\Blog\Forms\BlogConfigForm;

if (class_exists(AdminEvents::class))
{
    AdminEvents::onAdminMainMenu(function($menu)
    {
        $menu->items['blog'] = [
            'url' => Url::createUrl('admin/blog-post'),
            'label' => t('admin.menu', 'Blog'),
            'icon' => 'fa fa-coffee'
        ];
    });
}

if (class_exists(AdminEvents::class))
{
    AdminEvents::onAdminOptionsMenu(function($event)
    {
        $modelClass = 'BasicApp\Blog\Forms\BlogConfigForm';

        $event->items[BlogConfigForm::class] = [
            'label' => t('admin.menu', 'Blog'),
            'icon' => 'fa fa-coffee',
            'url' => Url::createUrl('admin/config', ['class' => BlogConfigForm::class])
        ];
    });
}