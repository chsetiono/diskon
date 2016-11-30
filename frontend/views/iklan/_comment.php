<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h3><?= Html::encode($model->user_rel->nama) ?></h3>
     <?= Html::encode($model->dtcreate) ?>
      <p>
    <?= HtmlPurifier::process($model->isi) ?>    
</div>
<hr>
