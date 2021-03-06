<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = 'Reset Password';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row row-content">
    <div class="col-lg-12 content">
        <h2><?= Html::encode($this->title) ?></h2>
        <p>Silahkan isi email pada form dibawah ini. Sebuah link untuk mereset password akun anda akan dikirim ke email tersebut.</p>

   
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form','options'=>['class'=>'form-inline']]); ?>
        
                <?= $form->field($model, 'email',['inputOptions'=>['class'=>'reset']]) ?>

                    <?= Html::submitButton('Reset', ['class' => 'btn btn-danger form-control']) ?>
   
            <?php ActiveForm::end(); ?>
    </div>
</div>

