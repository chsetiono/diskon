<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produks';
?>

   
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
         'layout' => '{summary}{items}<div class="clear"></div>{pager}',
         'summaryOptions'=>['class'=>'summary'],
	 'itemView'=>'_view',
    ]); ?>


