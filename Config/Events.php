<?php

use BasicApp\Helpers\Url;
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\System\Events\SystemSeedEvent;
use BasicApp\Blog\Database\Seeds\BlogResetSeeder;
use BasicApp\Blog\Database\Seeds\BlogSeeder;
use Config\Database;
use BasicApp\Blog\Forms\BlogConfigForm;

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

    AdminEvents::onOptionsMenu(function($event)
    {
        $event->items[BlogConfigForm::class] = [
            'label' => t('admin.menu', 'Blog'),
            'url' => Url::createUrl('admin/config', ['class' => BlogConfigForm::class]),
            'icon' => 'fa fa-fw fa-coffee'
        ];
    });
}

SystemEvents::onSeed(function(SystemSeedEvent $event)
{
    $seeder = Database::seeder();

    $seeder->call(BlogSeeder::class);
});

SystemEvents::onReset(function(SystemResetEvent $event)
{
    $seeder = Database::seeder();

    $seeder->call(BlogResetSeeder::class);
});