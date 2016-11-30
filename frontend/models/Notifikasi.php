<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "Notifikasi".
 *
 * @property integer $id_notifikasi
 * @property integer $tipe
 * @property integer $id_item
 * @property string $dtcreate
 * @property integer $status
 */
class Notifikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Notifikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipe', 'id_item', 'dtcreate', 'status'], 'required'],
            [['tipe', 'id_item', 'status'], 'integer'],
            [['dtcreate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_notifikasi' => 'Id Notifikasi',
            'tipe' => 'Tipe',
            'id_item' => 'Id Item',
            'dtcreate' => 'Dtcreate',
            'status' => 'Status',
        ];
    }
}
