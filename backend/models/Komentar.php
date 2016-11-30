<?php

namespace backend\models;

use Yii;
use backend\models\User;
/**
 * This is the model class for table "komentar".
 *
 * @property integer $id_komentar
 * @property integer $id_produk
 * @property integer $id_user
 * @property string $isi
 * @property string $dtcreate
 * @property integer $status
 */
class Komentar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'komentar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isi'], 'required'],
            [['id_komentar', 'id_produk', 'id_user', 'status'], 'integer'],
            [['isi'], 'string'],
            [['dtcreate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */

    public function getUser_rel()
    {
         return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function attributeLabels()
    {
        return [
            'id_komentar' => 'Id Komentar',
            'id_produk' => 'Id Produk',
            'id_user' => 'Id User',
            'isi' => 'Komentar',
            'dtcreate' => 'Dtcreate',
            'status' => 'Status',
        ];
    }
}
