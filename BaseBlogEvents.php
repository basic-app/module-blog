<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog;

use BasicApp\Core\Event;

abstract class BaseBlogEvents extends \CodeIgniter\Events\Events
{

    const EVENT_BLOG_POST_TEXT = 'blog_post_text';

    public static function blogPostText($postText)
    {
        $event = new Event;

        $event->result = $postText;

        static::trigger(static::EVENT_BLOG_POST_TEXT, $event);

        return $event->result;
    }

    public static function onBlogPostText($callback)
    {
        static::on(static::EVENT_BLOG_POST_TEXT, $callback);
    }

}