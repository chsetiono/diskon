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

            <div class="row">
        	<h2 class="center"><span class="glyphicon glyphicon-fire"></span> Hot Promo</h2>
		<div class="slider"> 
		<?php 
			foreach ($model as $item){
		                $img=File::find()->where(['id_item'=>$item->id_produk])->one();
		  		echo '<div class="col-xs-6 col-md-3 thumb">';
				if($img){
				   $link= Html::img('upload/produk/'.$img->nama_file,['class'=>'img-responsive item']);
				}else{
		                   echo $link= '<img src="http://placehold.it/350x150&text=FooBar9">';
		                 }
	                         $link.='<h5>'.$item->nama_produk.'</h5>';
                                 //echo Html::a($link, ['iklan/view','id'=>$item->id_produk]);
                                echo $link;
                                echo  Html::Button('<span class="glyphicon glyphicon-eye-open"></span> View',
					  ['value'=>Url::to('index.php?r=iklan/viewajax&id='.$item->id_produk),
					'class'=>'btn view','id'=>'viewButton','onclick'=>"$('#modal').modal('show')
                      .find('#modalContent')
                      .load($(this).attr('value'));"]) ;
                            
                                 echo "<span class='right'>".
					Html::a('<span class="glyphicon glyphicon-share-alt"> GET IT</span>',
						 ['iklan/view','id'=>$item->id_produk],['class'=>'btn get-it']).
                                      "</span>";
			
				echo '</div>';
			}
		 ?>
           </div>
      
 
</div>
<?php

//modal rating
Modal::begin([
	'id'=>'modal',
	'size'=>'modal-lg',
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
