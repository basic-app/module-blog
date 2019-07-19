<?php

use BasicApp\Helpers\Url;

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm(['model' => $model, 'errors' => $errors]);

$url = Url::currentUrl();

echo $form->formOpen($url);

echo $form->input('post_title');

echo $form->input('post_slug');

echo $form->textarea('post_description', ['rows' => 5]);

$blogConfig = config(BasicApp\Blog\Config\BlogConfig::class);

if ($blogConfig->admin_editor_class)
{
    echo $form->textarea('post_text', ['rows' => 5, 'class' => $blogConfig->admin_editor_class]);
}
else
{
    echo $form->editorTextarea('post_text', ['rows' => 5]);
}

echo $form->checkbox('post_active');

echo $form->dropdown('post_lang', BasicApp\Helpers\LocaleHelper::getLangItems());

echo $form->renderErrors();

$label = $model->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Insert');

echo $form->submit($label);

echo $form->formClose();