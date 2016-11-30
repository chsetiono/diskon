<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\ProdukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'post',
	'options' =>['class'=>'form-inline'],
    ]); ?>

    <?= $form->field($model, 'nama_produk',['options'=>[['style'=>'width:400px']]])->label(false) ?>

    <?= $form->field($model, 'kategori')->label(false) ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'satuan') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'minimum_order') ?>

    <?php // echo $form->field($model, 'dtcreate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
