<?php
/* @var $this BannersController */
/* @var $model Banners */
echo json_encode([
    'id' => $model->id,
    'text' => $model->text,
    'title' => $model->title,
    'status' => $model->status,
]);
exit(0);
?>