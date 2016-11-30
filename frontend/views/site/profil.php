<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Profil';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row row-content">
     <?= Yii::$app->user->id; ?>
        <div class="col-md-6 col-md-offset-3 content">
             <h2><?= Html::encode($this->title) ?></h2>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                <?= $form->field($model, 'username') ?>
		<?= $form->field($model, 'nama') ?>
		<?= $form->field($model, 'website') ?>
                <?= $form->field($model, 'lokasi') ?>
                <?= $form->field($model, 'telepon') ?>
                <?= $form->field($model, 'avatar')->fileInput() ?>
     
                <div class="form-group">
                    <?= Html::submitButton('Simpan', ['class' => 'btn btn-danger login form-control', 'name' => 'profil-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
