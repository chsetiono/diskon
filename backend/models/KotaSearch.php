<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kota;

/**
 * KotaSearch represents the model behind the search form about `backend\models\Kota`.
 */
class KotaSearch extends Kota
{
    public $nama_provinsi;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kota', 'provinsi', 'nama_kota'], 'integer'],
 	    [['nama_provinsi'], 'safe'],
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
        $query = Kota::find();
	$query->joinWith(['provinsi_rel']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
 	$dataProvider->sort->attributes['nama_provinsi'] = [
        'asc' => ['provinsi.nama_provinsi' => SORT_ASC],
        'desc' => ['provinsi.nama_provinsi' => SORT_DESC],
    ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_kota' => $this->id_kota,
            'provinsi' => $this->provinsi,
            'nama_kota' => $this->nama_kota,
        ])
	  ->andFilterWhere(['like', 'provinsi.nama_provinsi', $this->nama_provinsi]);

        return $dataProvider;
    }
}
