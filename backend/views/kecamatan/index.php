<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KecamatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kecamatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecamatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kecamatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kecamatan',
             [
		 'attribute' => 'nama_provinsi',
		 'value' => 'provinsi_rel.nama_provinsi'
	    ],
            [
		 'attribute' => 'nama_kota',
		 'value' => 'kota_rel.nama_kota'
	    ],
            'nama_kecamatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
