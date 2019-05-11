<?php
/**
 * @package Basic App Blog
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Blog\Models;

use BasicApp\Blog\Config\BlogConfig;

abstract class BaseBlogConfigModel extends \BasicApp\Core\DatabaseConfigModel
{

    protected $returnType = BlogConfig::class;

    protected $validationRules = [
        'admin_editor_class' => 'trim|max_length[255]',
        'multilanguage' => 'in_range[0,1]'
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

    public static function getFormFields($model)
    {
        return [
            [
                'type' => 'text',
                'name' => 'admin_editor_class',
                'value' => $model->admin_editor_class,
                'label' => static::label('admin_editor_class')
            ],
            [
                'type' => 'checkbox',
                'name' => 'multilanguage',
                'value' => $model->multilanguage,
                'label' => static::label('multilanguage')
            ]            
        ];
    }

}