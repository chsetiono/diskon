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
    <div class="col-lg-12">
      <div class="content">
           <h1><?= Html::encode($this->title) ?></h1>
	     <h4>
		
                 <span class="glyphicon glyphicon-time"></span> <?= $model->dtcreate ?>
                 <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="padding-top:20px;">
                 </span>
		<?=$model->kategori_rel->nama_kategori ?>
	     </h4>
             <div class="social-box">
		     <div class="fb-like" data-href="http://localhost/azfood/frontend/web/index.php?r=iklan%2Fview&amp;id=45"
			data-width="300px" data-layout="standard" data-action="like" data-show-faces="true" data-share="true">
		     </div>
             </div>

            <?php
               /*
               Pjax::begin(['id'=>'rating','enablePushState' => false]);
	          Yii::$app->session->getFlash('succes');
		  echo '<label class="control-label">Rating</label>';
		  echo StarRating::widget([
			'name' => 'rating_21',
			'value'=>'3',
			'pluginOptions' => [
			'readonly'=>true,
			'min' => 0,
			'max' => 5,
			'step' => 0.5,
			//'size' => 'lg',
			'starCaptions' => [
			0 => 'Extremely Poor',
			1 => 'Very Poor',
			2 => 'Poor',
			3 => 'Ok',
			4 => 'Good',
			5 => 'Very Good',
			],
			'starCaptionClasses' => [
			0 => 'text-danger',
			1 => 'text-danger',
			2 => 'text-warning',
			3 => 'text-info',
			4 => 'text-primary',
			5 => 'text-success',
			],
			],
			]);
	       //modal rating
		Modal::begin([
			    'header' => '<h2>Beri Rating</h2>',
			    'id'=>'modal',
			    'size'=>'modal-md',
		]);
			echo '<div id="modalContent"></div>';
	        Modal::end();
          Pjax::end();
          if (Yii::$app->user->isGuest){
             echo  Html::a('<span class="glyphicon glyphicon-star"> Rate</span>',['/site/login'],['class'=>'btn btn-default']) ;
          }else{
             echo  Html::Button('<span class="glyphicon glyphicon-star"> Rate</span>',
               ['value'=>Url::to('index.php?r=iklan/rate&id='.$model->id_produk),'class'=>'btn btn-default','id'=>'modalButton']) ;
	 }
         */
          Pjax::begin(['id'=>'save','enablePushState' => false]);
                  $mark= Mark::find()->where(['id_item'=>$model->id_produk,'id_user'=>Yii::$app->user->id])->one();
                  if($mark){
                       echo Html::a(' Like', ['iklan/unsave','id'=>$model->id_produk], 
				['class' => 'btn  btn-danger glyphicon glyphicon-heart-empty']);
                  }else{         
			echo Html::a(' Like', ['iklan/save','id'=>$model->id_produk], 
				['class' => 'btn  btn-default glyphicon glyphicon-heart-empty']);
 		 }  
	 Pjax::end(); 
         if (Yii::$app->user->isGuest){
             echo  Html::a('<span class="glyphicon glyphicon-share-alt"> Send</span>',['/site/login'],['class'=>'btn btn-default']) ;
         }else{
        echo  Html::Button('<span class="glyphicon glyphicon-share-alt"> Send</span>',
					  ['value'=>Url::to('index.php?r=iklan/forward&id='.$model->id_produk),
					'class'=>'btn btn-default','id'=>'viewButton','onclick'=>"$('#modalShare').modal('show')
                      .find('#shareContent')
                      .load($(this).attr('value'));"]) ;
         }
        Modal::begin([
			    'header' => '<h2>Share</h2>',
			    'id'=>'modalShare',
			    'size'=>'modal-md',
			]);

			echo '<div id="shareContent"></div>';
        Modal::end();
        ?>
       </div> <!-- end content -->
    </div> <!-- end col-lg-12 -->
    <p>&nbsp;</p>

    <div class="col-lg-8">
	<div class="content">
		<ul class="bxslider" style="margin-bottom:0px";>
		  <?php
			foreach ($picture as $pic){
				echo "<li>".Html::img('upload/produk/'.$pic->nama_file,['class'=>'img-responsive item-view'])."</li>";
		       }
		   ?>
		</ul>
		<div id="bx-pager" style="margin-top:-50px";>
		    <?php
			foreach ($picture as $index=>$pic){
				echo   '<a data-slide-index="'.$index.'" href="">'
					.Html::img('upload/produk/'.$pic->nama_file,['class'=>'img-responsive item-control']).'</a>';
		       }
		   ?>
		</div>
	       <div>
		     <?php
			echo $model->deskripsi;
		     ?>
		</div>
                <!--
               <?php
		 if (Yii::$app->user->isGuest){
		             echo  Html::a('Komentari',
					['/site/login'],['class'=>'btn btn-default']) ;
		 }else{
		           echo  Html::Button('Komentari',['value'=>Url::to('index.php?r=iklan/komentar&id='.$model->id_produk),
					'class'=>'btn btn-default','id'=>'modalButtonComment']) ;
		 }
         	 Modal::begin([
			    'header' => '<h2>Beri Komentar</h2>',
			    'id'=>'modalComment',
			    'size'=>'modal-md',
			]);

			echo '<div id="modalComment"></div>';
                 Modal::end();
              ?>
              -->
          
              <div id="isi_komentar">
                   <!--
		   <?php
		     echo ListView::widget([
			    'dataProvider' => $komentar,
			    'itemView' => '_comment',
			]);
		   ?>
                  -->
                  <div class="fb-comments" data-href="http://localhost/azfood/frontend/web/index.php?r=iklan%2Fview&id=45" data-width="100%" data-numposts="5">
</div>
               </div>
        </div><!-- end content --> 
     </div>
     <div class="col-lg-4">
	     <div class="content">
		 <h3> <span class="glyphicon glyphicon-user"></span> <?= $user->nama ?> </h3>
                  <?php
                   Pjax::begin(['id'=>'follow','enablePushState' => false]);
                  $mark= Mark::find()->where(['id_item'=>$model->id_produk,'id_user'=>Yii::$app->user->id])->one();
                  if($mark){
                       echo Html::a(' Unfollow', ['iklan/unsave','id'=>$model->id_produk], 
				['class' => 'btn  btn-default']);
                  }else{         
			echo Html::a(' Follow', ['iklan/save','id'=>$model->id_produk], 
				['class' => 'btn  btn-danger']);
 		 }  
	 Pjax::end(); 
 ?>
	    </div>
     </div>
</div>
<script>
	$(document).ready(function(){
		$('.bxslider').bxSlider({
                   auto: true,
                   autoControls: true,
		  pagerCustom: '#bx-pager'
		});
                $('#modalButton').click(function(){
                    $('#modal').modal('show')
                      .find('#modalContent')
                      .load($(this).attr('value'));
                });
              $('#modalButtonComment').click(function(){
                    $('#modalComment').modal('show')
                      .find('#modalComment')
                      .load($(this).attr('value'));
                });
	});


</script>
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_comment").on("pjax:end", function() {
            $.pjax.reload({container:"#comment"});  //Reload GridView
        });
    });'
);
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=385219158321444";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<style>
#save{
margin-right:5px;
display:inline;
}
</style>
