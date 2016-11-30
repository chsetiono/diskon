<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $id_rating
 * @property integer $id_item
 * @property integer $id_user
 * @property string $value
 * @property string $dtcreate
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_item'], 'required'],
            [['id_item', 'id_user'], 'integer'],
            [['dtcreate'], 'safe'],
            [['value'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rating' => 'Id Rating',
            'id_item' => 'Id Item',
            'id_user' => 'Id User',
            'value' => 'Value',
            'dtcreate' => 'Dtcreate',
        ];
    }
}
