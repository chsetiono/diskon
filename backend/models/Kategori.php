<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property integer $kategori_id
 * @property integer $parent
 * @property string $nama_kategori
 * @property string $gambar
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kategori'], 'required'],
            [['parent'], 'integer'],
            [['nama_kategori', 'gambar'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kategori_id' => 'Kategori ID',
            'parent' => 'Parent',
            'nama_kategori' => 'Nama Kategori',
            'gambar' => 'Gambar',
        ];
    }


	public function getKategoriTree($id_parent = null, $spacing = '', $category_tree_array = '') 
        {
       
	    $kategori = Kategori::find()
	    ->where(['parent' => $id_parent])
	    ->all();
            foreach($kategori as $v)
            { 
                   
                    $category_tree_array[$v['kategori_id']]=$spacing . $v['nama_kategori'];
                    $category_tree_array = Kategori::getKategoriTree($v['kategori_id'], $spacing . ' - ', $category_tree_array);
            }
            return $category_tree_array;
        }
}
