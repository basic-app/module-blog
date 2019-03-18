<?php

namespace BasicApp\Blog\Controllers\Admin;

use BasicApp\Blog\Models\BlogPostModel;

class BlogPost extends \BasicApp\Core\AdminCrudController
{

	protected $modelClass = BlogPostModel::class;

	protected $viewPath = 'BasicApp\Blog\Admin\BlogPost';

	protected $returnUrl = 'admin/blog-post';

    protected $orderBy = 'post_created_at DESC';

    protected $perPage = 10;

}
