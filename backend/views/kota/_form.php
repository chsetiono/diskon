<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Provinsi;


/* @var $this yii\web\View */
/* @var $model backend\models\Kota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kota-form">

    <?php $form = ActiveForm::begin(); ?>

	<?=
	$form->field($model, 'provinsi')
	     ->dropDownList(
		    ArrayHelper::map(Provinsi::find()->all(), 'id_provinsi', 'nama_provinsi')
		    )
	?>
    <?= $form->field($model, 'nama_kota')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
