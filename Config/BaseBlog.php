<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Config;

use BasicApp\Blog\Forms\BlogConfigForm;

abstract class BaseBlog extends \BasicApp\Config\BaseConfig
{

    public $admin_editor_class;

    public $modelClass = BlogConfigForm::class;

}