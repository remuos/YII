<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Location;
use kartik\select2\Select2 ;
/* @var $this yii\web\View */
/* @var $model backend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
    <?=
		 $form->field($model, 'zip_code')->widget(Select2::classname(), [
	    'data' => ArrayHelper::map(Location::find()->all(),'location_id','zip_code'),
	    'language' => 'fr',
	    'options' => ['placeholder' => 'Select a Zip Code ...','id'=>'zipCode'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
		]);
	?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$script = <<< JS
// here you right all your javascript stuff
$('#zipCode').change(function(){
	var zipId = $(this).val();
	$.get('index?r=location/get-city-province',{zipId : zipId},function(data){
		//alert(data);
		var data = $.parseJSON(data);
		$('#customers-city').attr('value',data.city);
		$('#customers-province').attr('value',data.province);
	});
})

JS;
$this->registerJS($script);
?>