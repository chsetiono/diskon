<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pesan;

/**
 * PesanSearch represents the model behind the search form about `backend\models\Pesan`.
 */
class PesanSearch extends Pesan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pesan', 'id_penerima', 'status'], 'integer'],
            [['email_penerima', 'email_pengirim', 'telepon_pengirim', 'judul', 'isi', 'dtcreate'], 'safe'],
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
        $query = Pesan::find();

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
            'id_pesan' => $this->id_pesan,
            'id_penerima' => $this->id_penerima,
            'dtcreate' => $this->dtcreate,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'email_penerima', $this->email_penerima])
            ->andFilterWhere(['like', 'email_pengirim', $this->email_pengirim])
            ->andFilterWhere(['like', 'telepon_pengirim', $this->telepon_pengirim])
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi', $this->isi]);

        return $dataProvider;
    }
}
