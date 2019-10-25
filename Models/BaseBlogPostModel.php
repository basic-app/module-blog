<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Models;

use Config\Services;

abstract class BaseBlogPostModel extends \BasicApp\Core\Model
{

	protected $table = 'posts';

	protected $primaryKey = 'post_id';

	protected $fieldLabels = [
		'post_id' => 'ID',
		'post_slug' => 'Slug',
		'post_title' => 'Title',
		'post_description' => 'Description',
		'post_created_at' => 'Created',
		'post_updated_at' => 'Updated',
		'post_text' => 'Text',
		'post_active' => 'Active'
	];

    protected $langCategory = 'post';

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

        if ($post->post_description)
        {
            $view->setVar('description', $post->post_description);
        }
    }

}