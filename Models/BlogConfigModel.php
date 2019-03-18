<?php

namespace BasicApp\Blog\Models;

use BasicApp\Core\DatabaseConfigModel;

class BlogConfigModel extends DatabaseConfigModel
{

    protected $returnType = BlogConfig::class;

    protected $validationRules = [
        'background_image_file' => 'trim|max_length[255]'
    ];

    public static function getFieldLabels()
    {
        return [
            'admin_editor_class' => t('app', 'Admin Editor Class')
        ];
    }

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
                'label' => static::fieldLabel('admin_editor_class')
            ]
        ];
    }

}