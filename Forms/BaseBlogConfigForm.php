<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Forms;

use BasicApp\Blog\Config\BlogConfig;

abstract class BaseBlogConfigForm extends \BasicApp\Configs\DatabaseConfigForm
{

    protected $returnType = BlogConfig::class;

    protected $validationRules = [
        'admin_editor_class' => 'trim|max_length[255]',
        'multilanguage' => 'in_list[0,1]'
    ];

    protected $labels = [
        'admin_editor_class' => 'Admin Editor Class',
        'multilanguage' => 'Multi-language'
    ];

    protected $translations = 'blog';

    public static function getFormName()
    {
        return t('admin.menu', 'Blog');
    }

    public function renderFields($form)
    {
        $return = '';

        $return .= $form->input('admin_editor_class');

        $return .= $form->checkbox('multilanguage');

        return $return;
    }

}