<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pesan */

$this->title = $model->id_pesan;
$this->params['breadcrumbs'][] = ['label' => 'Pesans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pesan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pesan], [
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
            'id_pesan',
            'id_penerima',
            'email_penerima:email',
            'email_pengirim:email',
            'telepon_pengirim',
            'judul',
            'isi:ntext',
            'dtcreate',
            'status',
        ],
    ]) ?>

</div>
