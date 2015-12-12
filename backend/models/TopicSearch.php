<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Topic;

/**
 * TopicSearch represents the model behind the search form about `backend\models\Topic`.
 */
class TopicSearch extends Topic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TopicId', 'TopicTypeId', 'ParentTopicId', 'TopicOrder', 'OldId', 'DocumentCount'], 'integer'],
            [['Name'], 'safe'],
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
        $query = Topic::find();

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
            'TopicId' => $this->TopicId,
            'TopicTypeId' => $this->TopicTypeId,
            'ParentTopicId' => $this->ParentTopicId,
            'TopicOrder' => $this->TopicOrder,
            'OldId' => $this->OldId,
            'DocumentCount' => $this->DocumentCount,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name]);

        return $dataProvider;
    }
}
