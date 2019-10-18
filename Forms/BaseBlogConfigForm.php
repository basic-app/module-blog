<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Forms;

use BasicApp\Blog\Config\BlogConfig;

abstract class BaseBlogConfigForm extends \BasicApp\Config\DatabaseConfigForm
{

    protected $returnType = BlogConfig::class;

    protected $validationRules = [
        'admin_editor_class' => 'trim|max_length[255]'
    ];

    protected $labels = [
        'admin_editor_class' => 'Admin Editor Class'
    ];

    protected $translations = 'blog';

    public function renderForm($form, $data)
    {
        $return = '';

        $return .= $form->inputGroup($data, 'admin_editor_class');

        return $return;
    }

}