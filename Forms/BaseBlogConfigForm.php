<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Forms;

use BasicApp\Blog\Config\Blog as BlogConfig;

abstract class BaseBlogConfigForm extends \BasicApp\Config\BaseConfigForm
{

    protected $returnType = BlogConfig::class;

    protected $validationRules = [
        'admin_editor_class' => 'not_special_chars|max_length[255]'
    ];

    protected $fieldLabels = [
        'admin_editor_class' => 'Admin Editor Class'
    ];

    protected $langCategory = 'blog';

    protected $allowedFields = [
        'admin_editor_class'
    ];

    public function renderForm($form, $data)
    {
        $return = '';

        $return .= $form->inputGroup($data, 'admin_editor_class');

        return $return;
    }

}