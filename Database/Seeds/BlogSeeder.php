<?php

namespace BasicApp\Blog\Database\Seeds;

use BasicApp\Blog\Models\BlogPostModel;
use BasicApp\Site\Models\PageModel;
use BasicApp\Site\Models\MenuModel;
use BasicApp\Site\Models\MenuItemModel;

class BlogSeeder extends \CodeIgniter\Database\Seeder
{

    public function run()
    {
        if ($this->db->table('posts')->countAllResults() > 0)
        {
            return;
        }

        BlogPostModel::factory()->protect(false)->insert([
            'post_slug' => 'first-post',
            'post_title' => 'First Post Title',
            'post_description' => 'First post description.',
            'post_text' => 'First post text.',
            'post_active' => 1
        ]);

        if (class_exists(PageModel::class))
        {
            $page = PageModel::getPage('blog', false);

            if (!$page)
            {
                PageModel::getPage('blog', true, [
                    'page_name' => 'Blog',
                    'page_text' => '<p>Blog page text.</p>',
                    'page_published' => 1
                ]);
            }

            if (class_exists(MenuModel::class))
            {
                $mainMenu = MenuModel::getMenu('main', false);

                if ($mainMenu)
                {
                    MenuItemModel::getEntity(
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
        }
    }

}