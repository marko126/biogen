<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MsdActivationCode;

/**
 * MsdActivationCodeSearch represents the model behind the search form about `app\models\MsdActivationCode`.
 */
class MsdActivationCodeSearch extends MsdActivationCode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actcodeid', 'status', 'devicetype', 'first_login'], 'integer'],
            [['section_name', 'doctor_name', 'hospital_name', 'activation_code', 'createdate', 'tokenid', 'tokendate', 'deviceid'], 'safe'],
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
        $query = MsdActivationCode::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'actcodeid' => $this->actcodeid,
            'status' => $this->status,
            'createdate' => $this->createdate,
            'tokendate' => $this->tokendate,
            'devicetype' => $this->devicetype,
            'first_login' => $this->first_login,
        ]);

        $query->andFilterWhere(['like', 'section_name', $this->section_name])
            ->andFilterWhere(['like', 'doctor_name', $this->doctor_name])
            ->andFilterWhere(['like', 'hospital_name', $this->hospital_name])
            ->andFilterWhere(['like', 'activation_code', $this->activation_code])
            ->andFilterWhere(['like', 'tokenid', $this->tokenid])
            ->andFilterWhere(['like', 'deviceid', $this->deviceid]);

        return $dataProvider;
    }
}
