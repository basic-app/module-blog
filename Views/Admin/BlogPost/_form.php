<?php

echo admin_theme_widget('formFieldText', [
    'name'  => 'post_title',
    'value' => $model->post_title,
    'label' => $model->fieldLabel('post_title'),
    'error' => array_key_exists('post_title', $errors) ? $errors['post_title'] : null
]);

echo admin_theme_widget('formFieldText', [
    'name'  => 'post_slug',
    'value' => $model->post_slug,
    'label' => $model->fieldLabel('post_slug'),
    'error' => array_key_exists('post_slug', $errors) ? $errors['post_slug'] : null
]);

echo admin_theme_widget('formFieldTextarea', [
    'name'  => 'post_description',
    'value' => $model->post_description,
    'label' => $model->fieldLabel('post_description'),
    'error' => array_key_exists('post_description', $errors) ? $errors['post_description'] : null,
    'options' => [
        'rows' => 5
    ]
]);

$blogConfig = config(BasicApp\Blog\Models\BlogConfig::class);

echo admin_theme_widget('formFieldTextarea', [
    'name'  => 'post_text',
    'value' => $model->post_text,
    'label' => $model->fieldLabel('post_text'),
    'error' => array_key_exists('post_text', $errors) ? $errors['post_text'] : null,
    'options' => [
        'class' => $blogConfig->admin_editor_class,
        'rows' => 10
    ]
]);

echo admin_theme_widget('formFieldCheckbox', [
    'name'  => 'post_active',
    'value' => $model->post_active,
    'label' => $model->fieldLabel('post_active'),
    'error' => array_key_exists('post_active', $errors) ? $errors['post_active'] : null
]);

echo admin_theme_widget('formErrors', ['errors' => $errors]);

echo admin_theme_widget('formButton', ['type' => 'submit', 'label' => $model->getPrimaryKey() ? t('admin', 'Update') : t('admin', 'Insert')]);