<?php
/* @var $this BannersController */
/* @var $model Banners */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Banners', 'url'=>array('index')),
	array('label'=>'Create Banners', 'url'=>array('create')),
	array('label'=>'Update Banners', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Banners', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Banners', 'url'=>array('admin')),
);
?>

<h1>View Banners #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'text',
		'status' => [
            'name' => 'Banner status',
            'value' => html_entity_decode(CHtml::decode($model->status==1?'On':'Off')),
        ],

		'views_count' => [
                'name' => 'Views count',
                'value' => $model->views_count>0?$model->views_count:'0'
        ],
        [
                'name' => 'Script html Code',
                'value' => '<script src="/js/banner.js" data-id="'.$model->id.'" async></script>'
        ]
	),
)); ?>
