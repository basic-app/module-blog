<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Cells;

use BasicApp\Blog\Config\BlogConfig;
use BasicApp\Blog\Models\BlogPostModel;
use Config\Services;
use CodeIgniter\View\Cells\Cell;

abstract class BaseLastPosts extends Cell
{

    public $limit = 10;

    public $orderBy = 'post_created_at DESC';

    public function render() : string
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

        return $this->view('last-posts_cell', [
            'elements' => $elements
        ]);
    }
}
