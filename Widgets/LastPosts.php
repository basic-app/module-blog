<?php

namespace BasicApp\Blog\Widgets;

use BasicApp\Blog\Models\BlogPostModel;

class LastPosts extends \BasicApp\Core\Widget
{

    public $limit = 10;

    public $orderBy = 'post_created_at DESC';

    public function render()
    {
        $query = new BlogPostModel;

        $query->where('post_active', 1);

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
