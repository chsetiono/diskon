<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kecamatan;

/**
 * KecamatanSearch represents the model behind the search form about `backend\models\Kecamatan`.
 */
class KecamatanSearch extends Kecamatan
{
    public $nama_provinsi;
    public $nama_kota;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kecamatan', 'nama_kecamatan'], 'integer'],
            [['lat', 'long','nama_kota','nama_provinsi'], 'safe'],
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
        $query = Kecamatan::find();
        $query->joinWith(['provinsi_rel','kota_rel']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['nama_provinsi'] = [
             'asc' => ['provinsi.nama_provinsi' => SORT_ASC],
            'desc' => ['provinsi.nama_provinsi' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['nama_kota'] = [
             'asc' => ['kota.nama_kota' => SORT_ASC],
            'desc' => ['kota.nama_kota' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_kecamatan' => $this->id_kecamatan,
            'nama_kecamatan' => $this->nama_kecamatan,
        ]);

        $query->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'long', $this->long])
            ->andFilterWhere(['like', 'provinsi.nama_provinsi', $this->nama_provinsi])
	    ->andFilterWhere(['like', 'kota.nama_kota', $this->nama_kota]);;
        return $dataProvider;
    }
}
