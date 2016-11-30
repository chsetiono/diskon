<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Kategori;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Galeri';
$this->params['breadcrumbs'][] = $this->title;
$datepicker = DateRangePicker::widget([
'name'=>'ProdukSearch[dtcreate]',
'value'=>$searchModel->dtcreate,
'useWithAddon'=>false,
'language'=>'id',
'hideInput'=>true,
'presetDropdown'=>true,
'pluginOptions'=>[
'format'=>'DD/MM/YYYY',
'separator'=>' - ',
'opens'=>'right',
],
]);
?>

<div class="col-lg-12 content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Pasang Karya', ['create'], ['class' => 'btn btn-info']) ?>
    </p>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama_produk',
             [
	     'attribute'=> 'kategori',
	     'value'=>'kategori_rel.nama_kategori',
             'filter' => Html::activeDropDownList($searchModel, 'kategori', 
		Kategori::getKategoriTree(),['class'=>'form-control','prompt' => 'Select Category'])
	     ],
            [
	     'attribute'=> 'dtcreate',
             'filter' => $datepicker,
	     ],
	    [
	     'attribute'=> 'status',
	     'value'=>'status_publish',
             'filter' => Html::activeDropDownList($searchModel, 'status', 
			['1'=>'Publis','0'=>'Unpublish'],['class'=>'form-control','prompt' => 'Select Status']),
	     ],
             [
	     'attribute'=> 'statistik',
	     'value'=>'statistik',
	     ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
