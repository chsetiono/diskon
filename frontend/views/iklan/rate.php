<?php 	
use kartik\widgets\StarRating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
yii\widgets\Pjax::begin(['id' => 'countries','enablePushState' => false]);
 
	
$form = ActiveForm::begin(['options' => ['data-pjax' => true ]]);
echo $form->field($rate, 'value')->widget(StarRating::classname(), [
    'pluginOptions' => [
			'min' => 0,
			'max' => 5,
			'step' =>1,
			//'size' => 'lg',
			'starCaptions' => [
			0 => 'Sangat Buruk',
			1 => 'Buruk',
			2 => 'Cukup',
			3 => 'Lumayan',
			4 => 'Baik',
			5 => 'Sangat Baik',
			],
			'starCaptionClasses' => [
			0 => 'text-danger',
			1 => 'text-danger',
			2 => 'text-warning',
			3 => 'text-info',
			4 => 'text-primary',
			5 => 'text-success',
			],
			],
]);
?>

<div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-info', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>


