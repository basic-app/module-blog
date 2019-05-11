<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Widgets;

use BasicApp\Blog\Config\BlogConfig;
use BasicApp\Blog\Models\BlogPostModel;
use Config\Services;

abstract class BaseLastPosts extends \BasicApp\Core\Widget
{

    public $limit = 10;

    public $orderBy = 'post_created_at DESC';

    public function render()
    {
        $request = Services::request();

        $query = new BlogPostModel;

        $query->where('post_active', 1);

        $blogConfig = config(BlogConfig::class);

        if ($blogConfig->multilanguage)
        {
            $query->where('post_lang', $request->getLocale());
        }

        if ($this->orderBy)
        {
            $query->orderBy($this->orderBy);
        }

        $elements = $query->findAll($this->limit);

        return app_view('BasicApp\Blog\last-posts', [
            'elements' => $elements
        ]);
    }

}
