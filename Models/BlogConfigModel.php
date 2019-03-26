<?php

namespace BasicApp\Blog\Models;

use BasicApp\Core\DatabaseConfigModel;

class BlogConfigModel extends DatabaseConfigModel
{

    protected $returnType = BlogConfig::class;

    protected $validationRules = [
        'admin_editor_class' => 'trim|max_length[255]'
    ];

    protected $labels = [
        'admin_editor_class' => 'Admin Editor Class'
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
            ]
        ];
    }

}