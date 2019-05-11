<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Config;

abstract class BaseBlogConfig extends \BasicApp\Core\DatabaseConfig
{

    public $admin_editor_class = 'form-control markdown';

    public $multilanguage = 0;

}