<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PesanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pesan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pesan') ?>

    <?= $form->field($model, 'id_penerima') ?>

    <?= $form->field($model, 'email_penerima') ?>

    <?= $form->field($model, 'email_pengirim') ?>

    <?= $form->field($model, 'telepon_pengirim') ?>

    <?php // echo $form->field($model, 'judul') ?>

    <?php // echo $form->field($model, 'isi') ?>

    <?php // echo $form->field($model, 'dtcreate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
