<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kota',
            [
		 'attribute' => 'nama_provinsi',
		 'value' => 'provinsi_rel.nama_provinsi'
	   ],
            'nama_kota',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
