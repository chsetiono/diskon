<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Kota;
use backend\models\Provinsi;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kecamatan-form">

    <?php $form = ActiveForm::begin(); 
$dataCategory=ArrayHelper::map(Provinsi::find()->asArray()->all(), 'id_provinsi', 'nama_provinsi');
echo $form->field($model, 'provinsi')->dropDownList(
                $dataCategory,
                [
                    'prompt'=>'Pilih Provinsi',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('/site/list').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'kota').'" ).html( data );
                            }
                        );
                    '    
                ]
        ); 
 $dataPost=ArrayHelper::map(\backend\models\Kota::find()->where(['provinsi' => $model->provinsi])->all(), 'id_kota', 'nama_kota');
    echo $form->field($model, 'kota')
        ->dropDownList(
            $dataPost,           
            []
        );
?>
    <?= $form->field($model, 'nama_kecamatan')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'long')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
