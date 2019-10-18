<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Models;

use BasicApp\Helpers\LocaleHelper;
use BasicApp\Blog\BlogEvents;

abstract class BaseBlogPost extends \BasicApp\Core\Entity
{

	protected $modelClass = BlogPostModel::class;

    public function __construct()
    {
        parent::__construct();

        $this->post_active = 1;
    }

	public function getUrl()
	{
		$url = 'blog/' . $this->post_id;

		if ($this->post_slug)
		{
			$url .= '-' . $this->post_slug;
		}

		return site_url($url);
	}

	public function getCreatedAsString()
	{
		return date('Y-m-d', strtotime($this->post_created_at));
	}

	public function getText()
	{
        return BlogEvents::blogPostText($this->post_text);
	}

    public function setMetaTags($view = null)
    {
        BlogPostModel::setPostMetaTags($this, $view);
    }

}
