<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pesan".
 *
 * @property integer $id_pesan
 * @property integer $id_penerima
 * @property string $email_penerima
 * @property string $email_pengirim
 * @property string $telepon_pengirim
 * @property string $judul
 * @property string $isi
 * @property string $dtcreate
 * @property integer $status
 */
class Pesan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penerima', 'email_penerima', 'email_pengirim', 'telepon_pengirim', 'judul', 'isi', 'dtcreate', 'status'], 'required'],
            [['id_penerima', 'status'], 'integer'],
            [['isi'], 'string'],
            [['dtcreate'], 'safe'],
            [['email_penerima', 'email_pengirim'], 'string', 'max' => 50],
            [['telepon_pengirim'], 'string', 'max' => 14],
            [['judul'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pesan' => 'Id Pesan',
            'id_penerima' => 'Id Penerima',
            'email_penerima' => 'Email Penerima',
            'email_pengirim' => 'Email Pengirim',
            'telepon_pengirim' => 'Telepon Pengirim',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'dtcreate' => 'Dtcreate',
            'status' => 'Status',
        ];
    }
}
