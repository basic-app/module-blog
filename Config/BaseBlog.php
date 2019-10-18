<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Config;

use BasicApp\Blog\Forms\BlogConfigForm;

abstract class BaseBlog extends \BasicApp\Config\DatabaseConfig
{

    public $admin_editor_class = 'form-control markdown';

    public $modelClass = BlogConfigForm::class;

}