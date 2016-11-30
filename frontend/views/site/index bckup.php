<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
use yii\bootstrap\Carousel;
use yii\widgets\ActiveForm;
use backend\models\Kategori;
use backend\models\Kota;
use backend\models\File;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use frontend\models\Mark;
?>
</div> <!-- close container -->
<div class="top-slide">
  	    <div id="carousel-example-generic" class="carousel" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/DSC00110_Java_Centre_Borobudur_at_Sunset_Time_%286220094684%29.jpg/800px-DSC00110_Java_Centre_Borobudur_at_Sunset_Time_%286220094684%29.jpg"/>
		      <div class="carousel-caption">
		
		      </div>
		    </div>
		    <div class="item">
		     <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTcsQubAwKniwG6qUdpAAaylrvIj0PdEEcvQ8Ev2SSfx5t1S_pB"/>
		      <div class="carousel-caption">
		
		      </div>
		    </div>
		
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
	    </div>
    <section id="premium">'====
            <div class="container">
        	<h3 class="center">Terbaru</h3>
    
		  <?php 
			foreach ($model as $item){
		                $img=File::find()->where(['id_item'=>$item->id_produk])->one();
		  		echo '<div class="col-xs-6 col-md-3">';
                                echo '<div class="thumb">';
                                //TOmbol Like
                                Pjax::begin(['id'=>$item->id_produk,'enablePushState' => false]);
		                         $mark= Mark::find()->where(['id_item'=>$item->id_produk,'id_user'=>Yii::$app->user->id])->one();
		          		if($mark){
					   echo Html::a(' Like', ['iklan/unsave','id'=>$item->id_produk], 
							['class' => 'btn  btn-info glyphicon glyphicon-heart-empty save-index']);
		                         }else{
	 				   echo Html::a(' Like', ['iklan/save','id'=>$item->id_produk], 
							['class' => 'btn  btn-default glyphicon glyphicon-heart-empty save-index']);
		                          }
                                Pjax::end(); 
                                //Rating
  				echo  Html::Button('<span class="glyphicon glyphicon-star"> Rate</span>',
              				 ['value'=>Url::to('index.php?r=iklan/rate&id='.$item->id_produk),
					'class'=>'btn btn-default rate-index','onclick'=>"$('#modal').modal('show')
                      			.find('#modalContent')
                      			.load($(this).attr('value'));"]);
				if($img){
				   $link= Html::img('upload/produk/'.$img->nama_file,['class'=>'img-responsive item']);
				}else{
		                   echo $link= '<img src="http://placehold.it/350x150&text=FooBar9">';
		                 }
	                         $link.='<h5>'.$item->nama_produk.'</h5>';
                                 echo Html::a($link, ['iklan/view','id'=>$item->id_produk]);   
				echo '</div>';
				echo '</div>';
			}
		 ?>
      
        </div>
       
</section>

<?php

//modal rating
Modal::begin([
	'header' => '<h2>Beri Rating</h2>',
	'id'=>'modal',
	'size'=>'modal-md',
	]);
	echo '<div id="modalContent">';
	  Pjax::begin(['id' => 'countries','enablePushState' => false]);
	  Pjax::end();
	echo '</div>';
 Modal::end();
?>

<script>
$(document).ready(function(){
  $('.slider').bxSlider({
    pager:false,
    slideWidth: 275,
    minSlides: 2,
    maxSlides: 4,
    startSlide: 0,
    slideMargin: 20
  });

});
</script>
