<?php

require __DIR__ . '/_common.php';

$this->data['breadcrumbs'][] = ['label' => t('admin', 'Create')];

?>
<form method="POST">

    <?= admin_theme_widget('card', [
        'header' => $title,
        'content' => app_view('BasicApp\Blog\Admin\BlogPost\_form', [
            'model' => $model,
            'errors' => $errors
        ])
    ]);?>

</form>