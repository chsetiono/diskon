<?php
use kartik\social\FacebookPlugin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\StarRating;
use yii\widgets\Pjax;
use frontend\models\Mark;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $model backend\models\Produk */

$this->title = $model->nama_produk;
?>
<div class="row" style="margin-top:20px;">
      <div class="content">
           <div class="col-lg-12">
           <h2><?= Html::encode($this->title) ?></h2>
             <?= Html::a('Get It', ['iklan/view','id'=>$model->id_produk],['class'=>'btn btn-danger btn-lg visit-page']) ?>
	     <h4>
                 <span class="glyphicon glyphicon-time"></span> <?= $model->dtcreate ?>
                 <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="padding-top:20px;">
                 </span>
		<?=$model->kategori_rel->nama_kategori ?>
                 <span class="glyphicon glyphicon-user"></span> <?= $user->nama ?> 
	     </h4>
           </div>
           <div class="col-lg-6">
             <?php
		echo Html::img('upload/produk/'.$picture[0]->nama_file,['class'=>'img-responsive item-view']);   
              ?>
         </div>	
         <div class="col-lg-6">
		 <?php
			echo $model->deskripsi;
		 ?>
	 </div>
         <div class="col-lg-12" st>
             <div class="fb-like" data-href="http://localhost/azfood/frontend/web/index.php?r=iklan%2Fview&amp;id=45"
			data-width="300px" data-layout="standard" data-action="like" data-show-faces="true" data-share="true">
             </div>
             <div class="fb-comments" data-href="http://localhost/azfood/frontend/web/index.php?r=iklan%2Fview&id=45" 
			data-width="100%" data-numposts="5">
	     </div>
        </div>
    </div><!-- end content --> 
 </div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=385219158321444";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

