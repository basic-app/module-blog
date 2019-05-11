<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Models;

use Config\Services;

abstract class BaseBlogPostModel extends \BasicApp\Core\Model
{

	protected $table = 'blog_posts';

	protected $primaryKey = 'post_id';

	protected $labels = [
		'post_id' => 'ID',
		'post_slug' => 'Slug',
		'post_title' => 'Title',
		'post_description' => 'Description',
		'post_created_at' => 'Created',
		'post_updated_at' => 'Updated',
		'post_text' => 'Text',
		'post_active' => 'Active',
        'post_lang' => 'Lang'
	];

    protected $translations = 'blog';

	protected $returnType = BlogPost::class;

	protected $useTimestamps = true;

	protected $createdField = 'post_created_at';

	protected $updatedField = 'post_updated_at';

    public static function setPostMetaTags($post, $view = null)
    {
        if (!$view)
        {
            $view = Services::renderer();
        }

        $view->setVar('title', $post->post_title);
    }

}