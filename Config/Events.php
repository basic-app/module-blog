<?php

use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;

if (class_exists(AdminEvents::class))
{
    AdminEvents::onMainMenu(function($menu)
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
    AdminEvents::onOptionsMenu(function($event)
    {
        $modelClass = BasicApp\Blog\Forms\BlogConfigForm::class;

        $event->items[$modelClass] = [
            'label' => t('admin.menu', 'Blog'),
            'icon' => 'fa fa-coffee',
            'url' => BasicApp\Helpers\Url::createUrl('admin/config', ['class' => $modelClass])
        ];
    });
}

SystemEvents::onSeed(function() {

    $seeder = Config\Database::seeder();

    $seeder->call(\BasicApp\Blog\Database\Seeds\BlogSeeder::class);
});