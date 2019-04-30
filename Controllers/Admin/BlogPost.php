<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Controllers\Admin;

use BasicApp\Blog\Models\Admin\BlogPostModel;

class BlogPost extends \BasicApp\Core\AdminCrudController
{

	protected $modelClass = BlogPostModel::class;

	protected $viewPath = 'BasicApp\Blog\Admin\BlogPost';

	protected $returnUrl = 'admin/blog-post';

    protected $orderBy = 'post_created_at DESC';

    protected $perPage = 10;

}