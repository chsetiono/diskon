<?php

namespace backend\models;
use backend\models\File;
use backend\models\Komentar;
use frontend\models\Mark;
use frontend\models\Rating;
use yii\db\Query;
use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property integer $id_produk
 * @property integer $user_id
 * @property integer $perusahaan_id
 * @property string $nama_produk
 * @property integer $kategori
 * @property integer $harga
 * @property integer $satuan
 * @property string $deskripsi
 * @property integer $minimum_order
 * @property string $dtcreate
 *
 * @property User $user
 * @property Perusahaan $perusahaan
 * @property Kategori $kategori0
 * @property Satuan $satuan0
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFiles;
    
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
 	    [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg', 'maxFiles' => 6],
            [['nama_produk', 'kategori', 'deskripsi'], 'required'],
            [['user_id','status', 'kategori', 'harga'], 'integer'],
            [['deskripsi'], 'string'],
            [['dtcreate'], 'safe'],
            [['nama_produk'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Iklan',
            'user_id' => 'User ID',
            'perusahaan_id' => 'Perusahaan ID',
            'nama_produk' => 'Judul',
            'kategori' => 'Kategori',
            'harga' => 'Harga',
            'satuan' => 'Satuan',
            'deskripsi' => 'Deskripsi',
            'minimum_order' => 'Minimum Order',
            'dtcreate' => 'Tanggal pasang',
        ];
    }
    public function upload()
    {
            $i=1;
            foreach ($this->imageFiles as $file) {
		$model2=new File();
		$model2->nama_file=time()."-".$this->id_produk."-".$i.".".$file->extension;
		$model2->use_for=1;
		$model2->id_item=$this->id_produk;
		$model2->save(false);
                $file->saveAs('upload/produk/' . time()."-".$this->id_produk."-".$i.".".$file->extension);
		$i++;
            }
           
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerusahaan_rel()
    {
        return $this->hasOne(Perusahaan::className(), ['id_supplier' => 'perusahaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori_rel()
    {
        return $this->hasOne(Kategori::className(), ['kategori_id' => 'kategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatuan_rel()
    {
        return $this->hasOne(Satuan::className(), ['id_satuan' => 'satuan']);
    }

    public function getStatus_publish()
    {
       if($this->status=='1'){
		return "Publish";
       }else{
		return "Unpublish";
	}
    }

   public function getStatistik(){
     $komentar = Komentar::find()
	    ->where(['id_produk' => $this->id_produk])
	    ->count();
     $like=Mark::find()
	  ->where(['id_item'=>$this->id_produk])
          ->count();
    $connection = \Yii::$app->db;
    $rate = $connection->createCommand("SELECT avg(value) FROM rating where id_item ='{$this->id_produk}'");
	$rate_count = $rate->queryScalar();
    return "rate ".$rate_count.", ".$komentar. " Komentar ".$like." Like ";


   }
}
