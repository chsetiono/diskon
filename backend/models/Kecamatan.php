<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property integer $id_kecamatan
 * @property integer $provinsi
 * @property integer $kota
 * @property integer $nama_kecamatan
 * @property string $lat
 * @property string $long
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi', 'kota', 'nama_kecamatan'], 'required'],
            [['provinsi', 'kota'], 'integer'],
            [['lat', 'long'], 'string', 'max' => 11]
        ];
    }
    public function getProvinsi_rel()
     {
	    return $this->hasOne(Provinsi::className(), ['id_provinsi' => 'provinsi']);
     }
      public function getKota_rel()
     {
	    return $this->hasOne(Kota::className(), ['id_kota' => 'kota']);
     }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kecamatan' => 'Id Kecamatan',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
            'nama_kecamatan' => 'Nama Kecamatan',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }
}
