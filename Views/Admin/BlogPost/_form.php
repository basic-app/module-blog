<?php

use BasicApp\Blog\Config\Blog as BlogConfig;
use BasicApp\Helpers\Url;

$blogConfig = config(BlogConfig::class);

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm($model, $errors);

echo $form->open();

echo $form->inputGroup($data, 'post_title');

echo $form->inputGroup($data, 'post_slug');

echo $form->textareaGroup($data, 'post_description', ['rows' => 5]);

if ($blogConfig->admin_editor_class)
{
    echo $form->textareaGroup($data, 'post_text', ['rows' => 5, 'class' => $blogConfig->admin_editor_class]);
}
else
{
    echo $form->editorTextareaGroup($data, 'post_text', ['rows' => 5]);
}

echo $form->checkboxGroup($data, 'post_active');

echo $form->renderErrors();

echo $form->beginButtons();

$label = $data->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Insert');

echo $form->submitButton($label);

echo $form->endButtons();

echo $form->close();