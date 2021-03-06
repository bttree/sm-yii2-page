<?php

namespace bttree\smypage\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PageCategorySearch represents the model behind the search form about `bttree\smypage\models\PageCategory`.
 */
class PageCategorySearch extends PageCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'status'], 'integer'],
            [['name', 'slug'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
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
        $query = PageCategory::find();

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
                                   'id'        => $this->id,
                                   'parent_id' => $this->parent_id,
                                   'status'    => $this->status,
                               ]);

        $query->andFilterWhere(['like', 'name', $this->name])
              ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
