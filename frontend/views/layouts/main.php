<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ButtonDropdown;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\BaseHtml;
use yii\widgets\ActiveForm;
use backend\models\Kategori;
use backend\models\Kota;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery.bxslider.min.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>
    <?php $this->head() ?>

   <script>
	$(document).ready(function(){
		  $(".toggle").click(function(){
		    $(".menu").slideToggle(700);
		  });
		});

   </script>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap" style="background-color:#F2F2F2;">
       <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="row">
             <div class="col-lg-12">
                 <div class="navbar-header">
		     <a class="navbar-brand" href="<?php echo Url::to(['site/index']) ?>">
			<?php echo Html::img('@web/images/logo.png',['class'=>'logo']) ?>
		     </a>
		  </div>
                  <div class="navbar-right">
                      <?php 
			if(Yii::$app->user->getIsGuest()){ 
                            echo '<a href="index.php?r=site/login" class="btn btn-danger btn-lg" style="margin:12px 18px 0px 0px;">+ Share Promo (Free)</a>';
                        }else{
			     echo ButtonDropdown::widget([
   				    'label' => Yii::$app->user->identity->username,
                                     'options'=>['class'=>'btn btn-info btn-lg','style'=>'margin-top:10px;margin-right:12px;'],
				    'dropdown' => [
					'items' => [
                                            ['label' => 'Pasang Diskon', 'url' => Url::to(['iklan/create'])],
					    ['label' => 'Manage Diskon', 'url' => Url::to(['iklan/manage'])],
					    ['label' => 'Akun', 'url' => Url::to(['site/profil'])],
                                            ['label' => 'Password', 'url' => Url::to(['site/password'])],
					    ['label' => 'logout', 'url' => Url::to(['site/logout']),'linkOptions'=>['data-method'=>'post']],
					],
				    ],
				]);
                     }
                      ?>
                    </div>
		 <?php
		$form = ActiveForm::begin([ 
		'id' => 'form_id', 
		'action'=>'index.php?r=site/search',
		'method'=>'get',
		'options' => [ 
		'class'=> 'form_bar', 
		'enctype' => 'multipart/form-data', 
		], 
		]);
		?> 
		<div class="form-group col-lg-5 col-md-4 col-sm-11 col-xs-11" style="margin-top:5px;margin-bottom:5px;padding:0px;" >
			<input name="key" class="form-control" style="height:40px;border-radius:3px;">
		</div>
		 <div class="form-group col-lg-1 col-sm-1 col-xs-1" style="margin-top:5px;margin-bottom:5px;padding:0px;" >
	               <button type="submit" class="form-control btn btn-default" style="height:40px;border-radius:3px;">Cari</button>
                 </div>
               <?php  ActiveForm::end();?>
                <span style="margin-right:20px;">
			<a class="toggle menu-button btn-lg">
			  <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="margin-top:20px;"></span>
			</a>
		</span>
 
            	<div class="menu">
			 <?php
			   $mainkategori=Kategori::find()->where(['parent'=>null])->all();  		
			   foreach ($mainkategori as $kategori){
				echo "<div class='col-lg-2 col-xs-4 kategori-main'><b>";
				echo Html::a($kategori->nama_kategori, ['site/search','kategori'=>$kategori->kategori_id]
				)."</b>";
				echo "<ul>";
				$subkategori=Kategori::find()->where(['parent'=>$kategori->kategori_id])->limit('10')->all();
				foreach ($subkategori as $sub){
				     echo "<li>".
		                     Html::a($sub->nama_kategori, ['site/search','kategori'=>$sub->kategori_id]
				)."</li>";
			    }
			    echo "</ul></div>";
			   }

			  ?>
                  </div><!-- /.menu -->
             </div> <!-- col-12 -->
           </div><!-- /.row -->
         </div> <!--row -->
    </nav>

    <div class="main-content">

	    <div class="container">
	
		<?= Breadcrumbs::widget([
		    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
		<?= Alert::widget() ?>
		<?= $content ?>
		</div>
    </div>
    <div id="bottom">
      <div class="container">

		 <div class="col-lg-4">
                   <h4>Layanan</h4>
                    <ul class="nav">
                      <li class="first leaf"><a href="https://www.mataharimall.com/faq">Cari Diskon</a></li>
                      <li class="leaf"><a href="https://www.mataharimall.com/size-guide">Share Diskon</a></li>
                      <li><a href="https://www.mataharimall.com/terms-conditions">Syarat dan Ketentuan</a></li>
                      <li><a href="https://www.mataharimall.com/kebijakan-privasi">Kebijakan Privasi</a></li>
                    </ul>
                 </div>
                 <div class="col-lg-4">
                   <h4>Info MisterDiskon.Com</h4>
                   <ul class="nav">
                      <li><a href="https://www.mataharimall.com/about">Tentang kami</a></li>
                      <li><a href="https://www.mataharimall.com/karir">Karir</a></li>
                      <li class="leaf"><a href="https://www.mataharimall.com/hubungi-kami">Hubungi Kami</a></li>
                      <li class="leaf"><a href="https://www.mataharimall.com/hubungi-kami">Peta Situs</a></li>
                    </ul>
                 </div>
                 <div class="col-lg-4">
                    <h4>Follow Us</h4>
                     <ul class="social-list">
                     <li><a href="https://www.facebook.com/misterdiskon"><img src='images/fb.png'></a></li>
                     <li><a href="https://www.twitter.com/misterdiskon"><img src='images/twitter.png'></a></li>
                     <li><a href="https://www.instagram.com/misterdiskon"><img src='images/instagram.png'></a></li>
                 </div>

      </div>
   </div>

    <footer class="footer">
        <div class="container">

		<p class="center">Copyright &copy; indiskon.com 2015</p>
		
      
	</div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
