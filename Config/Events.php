<?php

if (class_exists(BasicApp\Site\SiteEvents::class))
{
    BasicApp\Site\SiteEvents::onSeed(function() {

        $page = BasicApp\Site\Models\PageModel::getPage('blog', false);

        if (!$page)
        {
            BasicApp\Site\Models\PageModel::getPage('blog', true, [
                'page_name' => 'Blog',
                'page_text' => '<p>Blog page text.</p>',
                'page_published' => 1
            ]);
        
            $mainMenu = BasicApp\Site\Models\MenuModel::getMenu('main', false);

            if ($mainMenu)
            {
                BasicApp\Site\Models\MenuItemModel::getEntity(
                    ['item_menu_id' => $mainMenu->menu_id, 'item_url' => '/blog'], 
                    true, 
                    [
                        'item_name' => 'Blog',
                        'item_enabled' => 1,
                        'item_sort' => 5
                    ]
                );
            }
        }
    });
}

if (class_exists(BasicApp\Admin\AdminEvents::class))
{
    BasicApp\Admin\AdminEvents::onMainMenu(function($menu)
    {
        $menu->items['blog'] = [
            'url' => Url::createUrl('admin/blog-post'),
            'label' => t('admin.menu', 'Blog'),
            'icon' => 'fa fa-coffee'
        ];
    });

    BasicApp\Admin\AdminEvents::onOptionsMenu(function($event)
    {
        $modelClass = BasicApp\Blog\Forms\BlogConfigForm::class;

        $event->items[$modelClass] = [
            'label' => t('admin.menu', 'Blog'),
            'icon' => 'fa fa-coffee',
            'url' => BasicApp\Helpers\Url::createUrl('admin/config', ['class' => $modelClass])
        ];
    });
}

BasicApp\System\SystemEvents::onSeed(function() {

    $seeder = Config\Database::seeder();

    $seeder->call(\BasicApp\Blog\Database\Seeds\BlogSeeder::class);
});