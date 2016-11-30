<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pesan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_penerima')->textInput() ?>

    <?= $form->field($model, 'email_penerima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_pengirim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon_pengirim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dtcreate')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
