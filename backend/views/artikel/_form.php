<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use letyii\tinymce\Tinymce;
use \yii\jui\yii\base\Model;
/* @var $this yii\web\View */
/* @var $model backend\models\Artikel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>


 
<?= $form->field($model, 'isi')->widget(letyii\tinymce\Tinymce::className(), [
    'options' => [
        'class' => '',
    ],
    'configs' => [ // Read more: http://www.tinymce.com/wiki.php/Configuration
        'link_list' => [
            [
                'title' => 'My page 1',
                'value' => 'http://www.tinymce.com',
            ],
            [
                'title' => 'My page 2',
                'value' => 'http://www.tinymce.com',
            ],
        ],
    ],
]);?>
    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'dtcreate')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
