<?php

namespace backend\models; 

use Yii;

/**
 * This is the model class for table "kota".
 *
 * @property integer $id_kota
 * @property integer $provinsi
 * @property integer $nama_kota
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi', 'nama_kota'], 'required'],
            ['provinsi', 'integer']
        ];
    }
	public function getProvinsi_rel()
	{
	    return $this->hasOne(Provinsi::className(), ['id_provinsi' => 'provinsi']);
	}
	 
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kota' => 'Id Kota',
            'provinsi' => 'Provinsi',
            'nama_kota' => 'Nama Kota',
        ];
    }
}
