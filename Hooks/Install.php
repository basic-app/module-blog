<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Hooks;

use BasicApp\Blog\Models\BlogPostModel;

class Install
{

    public static function run()
    {
        $query = BlogPostModel::factory();

        $count = $query->countAllResults();

        if ($count > 0)
        {
            return;
        }

        $query->protect(false)->insert([
            'post_slug' => 'first-post',
            'post_title' => 'First Post Title',
            'post_description' => 'First post description.',
            'post_text' => 'First post text.',
            'post_active' => 1
        ]);
    }

}