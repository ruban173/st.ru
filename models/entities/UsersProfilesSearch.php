<?php

namespace app\models\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\entities\UsersProfiles;

/**
 * UsersProfilesSearch represents the model behind the search form of `app\models\entities\UsersProfiles`.
 */
class UsersProfilesSearch extends UsersProfiles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'birdthday', 'date_up', 'group'], 'safe'],
        ];
    }

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
    public function search($params)
    {
        $query = UsersProfiles::find();

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
            'id' => $this->id,
            'birdthday' => $this->birdthday,
            'date_up' => $this->date_up,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'group', $this->group]);

        return $dataProvider;
    }
}
