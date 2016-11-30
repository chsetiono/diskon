<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "artikel".
 *
 * @property integer $id_artikel
 * @property string $judul
 * @property string $isi
 * @property string $foto
 * @property string $dtcreate
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'foto', 'dtcreate'], 'required'],
            [['isi'], 'string'],
            [['dtcreate'], 'safe'],
            [['judul', 'foto'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_artikel' => 'Id Artikel',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'foto' => 'Foto',
            'dtcreate' => 'Dtcreate',
        ];
    }
}
