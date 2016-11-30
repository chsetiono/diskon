<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient;
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
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
		<?= $form->field($user, 'nama') ?>
		<?= $form->field($user, 'email') ?>
                <?= $form->field($user, 'username') ?>
                <?= $form->field($user, 'password')->passwordInput() ?>
                 <div style="color:#999;margin:1em 0">
                     <?= Html::a('Login', ['site/login']) ?>.
                     <span style="float:right">
                    <?= Html::a('Reset Password', ['site/request-password-reset']) ?>.
                     </span>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-danger form-control', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
	<?= yii\authclient\widgets\AuthChoice::widget([
	     'baseAuthUrl' => ['site/auth'],
	     'popupMode' => true,
	]) ?>
        </div>
    </div>
</div>
