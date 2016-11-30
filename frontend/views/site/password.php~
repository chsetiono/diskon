<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="row row-content-login">
   <div class="col-md-6 col-md-offset-3  content">
        <div class="logo-user"><h1><span class="glyphicon glyphicon-user"></h2></div>
        <h2 class="login"><?= Html::encode($this->title) ?></h1>
               <?php $form = ActiveForm::begin([
        'id'=>'changepassword-form',
        'options'=>['class'=>'form-horizontal'],
    ]); ?>
        <?= $form->field($model,'password',['inputOptions'=>[
            'placeholder'=>'Old Password'
        ]])->passwordInput() ?>
       
        <?= $form->field($model,'newpass',['inputOptions'=>[
            'placeholder'=>'New Password'
        ]])->passwordInput() ?>
       
        <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
            'placeholder'=>'Repeat New Password'
        ]])->passwordInput() ?>
       
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-11">
                <?= Html::submitButton('Change password',[
                    'class'=>'btn btn-primary'
                ]) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div> 
    </div>
</div>
