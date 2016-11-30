<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Produk;
use backend\models\User;
/**
 * ProdukSearch represents the model behind the search form about `backend\models\Produk`.
 */
class ProdukSearch extends Produk
{
    /**
     * @inheritdoc
     */
    public $statistik;
    public function rules()
    {
        return [
            [['nama_produk', 'status', 'kategori','deskripsi', 'statistik','dtcreate','kota'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produk::find();
	$query->joinWith(['kategori_rel']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
	$dataProvider->sort->attributes['kategori'] = [
		'asc' => ['kategori.nama_kategori' => SORT_ASC],
		'desc' => ['provinsi.nama_kategori' => SORT_DESC],
	    ];	
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
	
        $query->andFilterWhere([
            'id_produk' => $this->id_produk,
            'user_id' => $this->user_id,
	    'status' => $this->status,
        ])
	->andFilterWhere(['like', 'kategori.nama_kategori', $this->kategori]);
      
        $query->andFilterWhere(['like', 'nama_produk', $this->nama_produk])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);
       if($this->dtcreate!=''){
		$dt_awal=substr($this->dtcreate,1,10);
		$dt_akhir=substr($this->dtcreate,12,10);
		$query->andFilterWhere(['>=', 'dtcreate',$dt_awal])->andFilterWhere(['<=','dtcreate',$dt_akhir]);
        }
       //if ($params=='user'){
	$query->andFilterWhere(['=', 'user_id',Yii::$app->user->id]);
        //}
        return $dataProvider;
    }
}
