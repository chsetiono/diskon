<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "file".
 *
 * @property integer $id_file
 * @property string $nama_file
 * @property integer $use_for
 * @property integer $id_item
 */
class File extends \yii\db\ActiveRecord
{
 
	public $upload_file;
 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
               [['upload_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,jpeg'],
	       [['nama_file','use_for','id_item'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_file' => 'Id File',
            'nama_file' => 'Nama File',
            'use_for' => 'Use For',
            'id_item' => 'Id Item',
        ];
    }

}
