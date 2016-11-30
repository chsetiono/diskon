<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
	'showHeader'=>false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama_produk',
             [
	     'attribute'=> 'kategori',
	     'value'=>'kategori_rel.nama_kategori',
	     ],

            'dtcreate',
	    [
	     'attribute'=> 'status',
	     'value'=>'status_publish',
	     ],

        
        ],
    ]); ?>

</div>
