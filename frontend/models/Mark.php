<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "mark".
 *
 * @property integer $id_mark
 * @property integer $id_item
 * @property integer $id_user
 * @property string $dtcreate
 */
class Mark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_item', 'id_user', 'dtcreate'], 'required'],
            [['id_item', 'id_user'], 'integer'],
            [['dtcreate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_mark' => 'Id Mark',
            'id_item' => 'Id Item',
            'id_user' => 'Id User',
            'dtcreate' => 'Dtcreate',
        ];
    }
}
