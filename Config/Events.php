<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
use CodeIgniter\Events\Events;

Events::on('admin_main_menu', function($menu)
{
    $menu->items['blog'] = [
        'url' => site_url('admin/blog-post'),
        'label' => t('admin.menu', 'Blog'),
        'icon' => 'fa fa-coffee'
    ];
});

Events::on('admin_options_menu', function($event)
{
    $modelClass = 'BasicApp\Blog\Models\BlogConfigModel';

    $event->items[$modelClass] = [
        'label' => $modelClass::getFormName(),
        'icon' => 'fa fa-coffee',
        'url' => classic_url('admin/config', ['class' => $modelClass])
    ];
});

Events::on('install', ['BasicApp\Blog\Hooks\Install', 'run']);