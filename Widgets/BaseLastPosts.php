<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Widgets;

use BasicApp\Blog\Config\BlogConfig;
use BasicApp\Blog\Models\BlogPostModel;
use Config\Services;

abstract class BaseLastPosts extends \BasicApp\Core\Widget
{

    public $limit = 10;

    public $orderBy = 'post_created_at DESC';

    public $viewPath = 'BasicApp\Blog';

    public function run()
    {
        $request = Services::request();

        $query = new BlogPostModel;

        $query->where('post_active', 1);

        $blogConfig = config(BlogConfig::class);

        if ($this->orderBy)
        {
            $query->orderBy($this->orderBy);
        }

        $elements = $query->findAll($this->limit);

        return $this->render('last-posts', [
            'elements' => $elements
        ]);
    }

}
