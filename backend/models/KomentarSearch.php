<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Komentar;

/**
 * KomentarSearch represents the model behind the search form about `backend\models\Komentar`.
 */
class KomentarSearch extends Komentar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_komentar', 'id_produk', 'id_user', 'status'], 'integer'],
            [['isi', 'dtcreate'], 'safe'],
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
        $query = Komentar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_komentar' => $this->id_komentar,
            'id_produk' => $this->id_produk,
            'id_user' => $this->id_user,
            'dtcreate' => $this->dtcreate,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'isi', $this->isi]);

        return $dataProvider;
    }
}
