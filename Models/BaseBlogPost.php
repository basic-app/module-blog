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

	public function url()
	{
		$url = 'blog/' . $this->post_id;

		if ($this->post_slug)
		{
			$url .= '-' . $this->post_slug;
		}

        $url = LocaleHelper::addLocaleToUrl($url, $this->post_lang);

        helper(['url']);

		return site_url($url);
	}

	public function createdAsString()
	{
		return date('Y-m-d', strtotime($this->post_created_at));
	}

	public function text()
	{
        return BlogEvents::blogPostText($this->post_text);
	}

    public function setMetaTags($view = null)
    {
        BlogPostModel::setPostMetaTags($this, $view);
    }

}
