<?php

namespace BasicApp\Blog\Models;

use Config\Services;

class BlogPostModel extends \BasicApp\Core\Model
{

	protected $table = 'blog_posts';

	protected $primaryKey = 'post_id';

	protected $allowedFields = [
		'post_slug',
		'post_title',
		'post_text',
		'post_published',
		'post_description',
		'post_active'
	];

	protected $validationRules = [
		'post_title' => 'trim|max_length[255]|required',
		'post_description' => 'trim|max_length[255]|required',
		'post_slug' => 'trim|max_length[255]|required|alpha_dash|is_unique[blog_posts.post_slug,post_id,{post_id}]',
		'post_text' => 'trim|max_length[65535]',
		'post_active' => 'in_list[0,1]'
	];

	protected $labels = [
		'post_id' => 'ID',
		'post_slug' => 'Slug',
		'post_title' => 'Title',
		'post_description' => 'Description',
		'post_created_at' => 'Created',
		'post_updated_at' => 'Updated',
		'post_text' => 'Text',
		'post_active' => 'Active'
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