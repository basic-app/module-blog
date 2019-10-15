<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Blog\Config;

use BasicApp\Blog\Forms\BlogConfigForm;

abstract class BaseBlogConfig extends \BasicApp\Configs\DatabaseConfig
{

    public $admin_editor_class = 'form-control markdown';

    public $multilanguage = 0;

    public $modelClass = BlogConfigForm::class;

}