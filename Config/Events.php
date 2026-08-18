<?php

use BasicApp\Helpers\Url;
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\Blog\Database\Seeds\BlogResetSeeder;
use Config\Database;
use BasicApp\Blog\Forms\BlogConfigForm;
use BasicApp\AdminMenu\AdminMenuEvents;

if (class_exists(AdminMenuEvents::class))
{
    AdminMenuEvents::onMainMenu(function($menu)
    {
        $menu->items['blog'] = [
            'url' => Url::createUrl('admin/blog-post'),
            'label' => t('admin.menu', 'Blog'),
            'icon' => 'fa fa-coffee'
        ];
    });

    AdminMenuEvents::onOptionsMenu(function($event)
    {
        $event->items[BlogConfigForm::class] = [
            'label' => t('admin.menu', 'Blog'),
            'url' => Url::createUrl('admin/config', ['class' => BlogConfigForm::class]),
            'icon' => 'fa fa-fw fa-coffee'
        ];
    });
}

SystemEvents::onReset(function(SystemResetEvent $event)
{
    $seeder = Database::seeder();

    $seeder->call(BlogResetSeeder::class);
});
