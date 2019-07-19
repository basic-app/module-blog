<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
use CodeIgniter\Events\Events;
use BasicApp\Helpers\Url;

Events::on('admin_main_menu', function($menu)
{
    $menu->items['blog'] = [
        'url' => Url::createUrl('admin/blog-post'),
        'label' => t('admin.menu', 'Blog'),
        'icon' => 'fa fa-coffee'
    ];
});

Events::on('admin_options_menu', function($event)
{
    $modelClass = 'BasicApp\Blog\Forms\BlogConfigForm';

    $event->items[$modelClass] = [
        'label' => $modelClass::getFormName(),
        'icon' => 'fa fa-coffee',
        'url' => Url::createUrl('admin/config', ['class' => $modelClass])
    ];
});

Events::on('install', ['BasicApp\Blog\Hooks\Install', 'run']);