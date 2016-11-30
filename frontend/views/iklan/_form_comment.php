<?php
use kartik\widgets\StarRating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
$form = ActiveForm::begin(['id' => 'comment-form','enableClientValidation' =>true,'enableAjaxValidation' =>false]); 
?>
                <?= $form->field($komentar, 'isi')->textarea()->label('Komentar') ?>
                <div class="form-group">
                    <?= Html::submitButton('Kirim Komentar', ['class' => 'btn btn-info', 'name' => 'login-button']) ?>
                </div>
<?php ActiveForm::end(); ?>

