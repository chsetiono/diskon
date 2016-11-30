<?php
namespace frontend\models;
use Yii;
use common\models\User;
use yii\base\Model;

/**
 * Password reset request form
 */
class ChangePassword extends Model
{
      public $password;
      public $newpass;
      public $repeatnewpass;
       
        public function rules(){
            return [
                [['password','newpass','repeatnewpass'],'required'],
                ['password','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
     public function findPasswords($attribute, $params){
            $user = User::find()->where([
                'id'=>Yii::$app->user->id
            ])->one();
            $password_db = $user->password;
            $password_form=$user->setPassword($this->password);
            if($password_db!=$password_form)
                $this->addError($attribute,'Old password is incorrect');
        }
       
    public function attributeLabels(){
            return [
                'password'=>'Old Password',
                'newpass'=>'New Password',
                'repeatnewpass'=>'Repeat New Password',
            ];
    }
    
     public function resetPassword()
    {
        $user = User::find()->where([
                'id'=>Yii::$app->user->id
            ])->one();
        $user->setPassword($this->newpass);
        return $user->save(false);
    }

    
}
