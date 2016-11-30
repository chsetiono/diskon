<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "follow".
 *
 * @property integer $id_follow
 * @property integer $follower
 * @property integer $followed
 */
class Follow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'follow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['follower', 'followed'], 'required'],
            [['follower', 'followed'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_follow' => 'Id Follow',
            'follower' => 'Follower',
            'followed' => 'Followed',
        ];
    }
}
