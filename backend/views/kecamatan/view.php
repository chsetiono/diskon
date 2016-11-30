<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */

$this->title = $model->id_kecamatan;
$this->params['breadcrumbs'][] = ['label' => 'Kecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecamatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kecamatan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kecamatan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kecamatan',
            [               
            'label' => 'Provinsi',
            'value' => $model->provinsi_rel->nama_provinsi,
       	     ],
            [               
            'label' => 'Kota',
            'value' => $model->kota_rel->nama_kota,
       	     ],
            'nama_kecamatan',
            'lat',
            'long',
        ],
    ]) ?>

</div>
