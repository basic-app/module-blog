<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Models\Admin;

abstract class BaseBlogPost extends \BasicApp\Blog\Models\BlogPost
{

	protected $modelClass = BlogPostModel::class;

}