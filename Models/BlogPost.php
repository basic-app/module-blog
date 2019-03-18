<?php

namespace BasicApp\Blog\Models;

use CodeIgniter\Events\Events;
use StdClass;

class BlogPost extends \BasicApp\Core\Entity
{

	protected $modelClass = BlogPostModel::class;

	public $post_id;

	public $post_created_at;

	public $post_updated_at;

	public $post_slug;

	public $post_title;

	public $post_description;

	public $post_text;

	public $post_active;

	public function url()
	{
		$url = 'blog/' . $this->post_id;

		if ($this->post_slug)
		{
			$url .= '-' . $this->post_slug;
		}

		return site_url($url);
	}

	public function createdAsString()
	{
		return date('Y-m-d', strtotime($this->post_created_at));
	}

	public function text()
	{
		$event = new StdClass;

		$event->post_text = $this->post_text;

		Events::trigger('blog_post_text', $event);

		return $event->post_text;
	}

    public function setMetaTags($view = null)
    {
        BlogPostModel::setPostMetaTags($this, $view);
    }

}
