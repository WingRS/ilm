<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form of `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public $region;
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at', 'ilm_year'], 'integer'],
            [['username', 'auth_key','globalSearch', 'password_hash', 'password_reset_token', 'email', 'city', 'name', 'surname', 'chair', 'company', 'facebook', 'linkedin', 'phone', 'bio', 'ilm_program', 'region'], 'safe'],
        ];
    }
    const  DEFAULT_REGION = "Україна";
    /**
     * {@inheritdoc}
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
    public function search($params, $region)
    {
        $query = User::find();

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
       $this->globalSearch = trim($this->globalSearch);


        $query->orFilterWhere(['like', 'username', $this->globalSearch])
            ->orFilterWhere(['like', 'auth_key', $this->globalSearch])
            ->orFilterWhere(['like', 'password_hash', $this->globalSearch])
            ->orFilterWhere(['like', 'password_reset_token', $this->globalSearch])
            ->orFilterWhere(['like', 'email', $this->globalSearch])
            ->orFilterWhere(['like', 'city', $this->globalSearch])
            ->orFilterWhere(['like', 'name', $this->globalSearch])
            ->orFilterWhere(['like', 'surname', $this->globalSearch])
            ->orFilterWhere(['like', 'chair', $this->globalSearch])
            ->orFilterWhere(['like', 'company', $this->globalSearch])
            ->orFilterWhere(['like', 'facebook', $this->globalSearch])
            ->orFilterWhere(['like', 'linkedin', $this->globalSearch])
            ->orFilterWhere(['like', 'phone', $this->globalSearch])
            ->orFilterWhere(['like', 'bio', $this->globalSearch])
            ->orFilterWhere(['like', 'ilm_program', $this->globalSearch]);
        if($region != self::DEFAULT_REGION) {
            $query->andFilterWhere(['=','city', $region]);
        }
//            ->andFilterWhere(['like', 'city', $this->region]);

        return $dataProvider;
    }

    public function searchAdmin($params)
    {
        $query = User::find();

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
        $this->globalSearch = trim($this->globalSearch);


        $query->orFilterWhere(['like', 'username', $this->globalSearch])
            ->orFilterWhere(['like', 'auth_key', $this->globalSearch])
            ->orFilterWhere(['like', 'password_hash', $this->globalSearch])
            ->orFilterWhere(['like', 'password_reset_token', $this->globalSearch])
            ->orFilterWhere(['like', 'email', $this->globalSearch])
            ->orFilterWhere(['like', 'city', $this->globalSearch])
            ->orFilterWhere(['like', 'name', $this->globalSearch])
            ->orFilterWhere(['like', 'surname', $this->globalSearch])
            ->orFilterWhere(['like', 'chair', $this->globalSearch])
            ->orFilterWhere(['like', 'company', $this->globalSearch])
            ->orFilterWhere(['like', 'facebook', $this->globalSearch])
            ->orFilterWhere(['like', 'linkedin', $this->globalSearch])
            ->orFilterWhere(['like', 'phone', $this->globalSearch])
            ->orFilterWhere(['like', 'bio', $this->globalSearch])
            ->orFilterWhere(['like', 'ilm_program', $this->globalSearch]);

//            ->andFilterWhere(['like', 'city', $this->region]);

        return $dataProvider;
    }
}
