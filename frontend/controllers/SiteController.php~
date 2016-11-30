<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use common\models\User;
use frontend\models\ChangePassword;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Kota;
use backend\models\Kecamatan;
use backend\models\Produk;
use backend\models\ProdukSearch;
use frontend\models\Auth;
use yii\web\UploadedFile;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','list','listkecamatan'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
        ];
    }

   public function onAuthSuccess($client)
    {
        $attributes = $client->getUserAttributes();

        if (Yii::$app->user->isGuest) {
                if (isset($attributes['email']) && $user=User::find()->where(['email' => $attributes['email']])->exists()) {
                     $user = User::find()->where(['email' => $attributes['email']])->one();
                     Yii::$app->user->login($user);
                } else {
                    $password = Yii::$app->security->generateRandomString(6);
                    //$password='1234567';
                    $user = new SignupForm([
                        'username' => $attributes['name'],
                         'nama' => $attributes['name'],
                        'email' => $attributes['email'],
                        'password' => $password,
                    ]);
                    if ($user->signup()) {
                            $this->mailPassword ($user,$password);
                            $userlog=User::find()->where(['email' => $attributes['email']])->one();
                            $userlog->status='10';
                            $userlog->save(false);
                            Yii::$app->user->login($userlog);
          
                    } else {
                        print_r($user->getErrors());
                    }
              }
        }
    }

    public function actionIndex()
    {
	$model=Produk::find()->limit(20)->where([])->orderby('dtcreate desc')->all();
        return $this->render('index',['model'=>$model]);
    }
   public function actionSearch($key='',$kategori=''){
         
	$searchModel = new ProdukSearch();
        $searchModel->nama_produk=$key;
        $searchModel->kategori=$kategori;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
	    'kategori'=>$kategori,
        ]);
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionAbout()
    {
        return $this->render('about');
    }
   
    /*
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    */

   public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $this->mailNotifikasi($user);
                return $this->render('succes_signup', [
            		'model' => $model,
       		]);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
    public function actionConfirmation($authkey) {
     $user= User::find()->where(['auth_key'=>$authkey])->one();
     if ($user){
          $user->status='10';
          $user->save();
            Yii::$app->getUser()->login($user);   
            return $this->goHome();
     }else {
        echo  "authkey tidak ditemukan";
      }

    }
    public function actionProfil(){
	$id_user=Yii::$app->user->id;
	$model= User::find()->where(['id'=>$id_user])->one();
	if ($model->load(Yii::$app->request->post())  and $model->validate()) {
                $temp = UploadedFile::getInstance($model, 'avatar');
                if($temp!=null){
                $model->avatar= time()."-".$id_user.".".$temp->extension;
                $temp->saveAs('upload/avatar/'. $model->avatar);
                }
                $model->save(false);
		Yii::$app->session->setFlash('success', 'Thank you ');
        }
            return $this->render('profil', [
                'model' => $model,
            ]);
    }

     public function actionPassword(){
	$id_user=Yii::$app->user->id;
	$model= new ChangePassword();
	if ($model->load(Yii::$app->request->post())  and $model->validate()) {
                $model->resetPassword();
		Yii::$app->session->setFlash('success', 'password succesfuly changed ');
        }
            return $this->render('password', [
                'model' => $model,
            ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

   public function mailNotifikasi ($user){
    Yii::$app->mailer->compose()
	->setFrom('chsetiono@yahoo.co.id')
	->setTo($user->email)
	->setSubject('Konfirmasi Registrasi FoodMaret.Com')
	->setTextBody($user->username)
	->setHtmlBody('HTML content')
	->send();
   }


  public function mailPassword ($user,$password){
    Yii::$app->mailer->compose()
	->setFrom('chsetiono@yahoo.co.id')
	->setTo($user->email)
	->setSubject('Konfirmasi Registrasi FoodMaret.Com')
	->setTextBody($password)
	->setHtmlBody('HTML content')
	->send();
   }

  public function actionList($id)
   {
	 $countPosts = Kota::find()
	 ->where(['provinsi' => $id])
	 ->count();
	 
	 $posts = Kota::find()
	 ->where(['provinsi' => $id])
	 ->orderBy('nama_kota DESC')
	 ->all();
	  echo "<option>Pilih Kota</option>";
	 if($countPosts>0){
		 foreach($posts as $post){
		 echo "<option value='".$post->id_kota."'>".$post->nama_kota."</option>";
	 }
	 }
	 else{
		 echo "<option>-</option>";
	 }
	 
     }
public function actionListkecamatan($id)
   {
	 $countPosts = Kecamatan::find()
	 ->where(['kota' => $id])
	 ->count();
	 
	 $posts = Kecamatan::find()
	 ->where(['kota' => $id])
	 ->orderBy('nama_kecamatan DESC')
	 ->all();
	 
	 if($countPosts>0){
		 foreach($posts as $post){
		 echo "<option value='".$post->id_kecamatan."'>".$post->nama_kecamatan."</option>";
	 }
	 }
	 else{
		 echo "<option>-</option>";
	 }
	 
     }
}
