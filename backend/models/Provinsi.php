<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property integer $id_provinsi
 * @property string $nama_provinsi
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_provinsi'], 'required'],
            [['nama_provinsi'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_provinsi' => 'Id Provinsi',
            'nama_provinsi' => 'Nama Provinsi',
        ];
    }
}
