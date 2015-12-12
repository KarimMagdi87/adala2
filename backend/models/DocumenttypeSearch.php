<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Documenttype;

/**
 * DocumenttypeSearch represents the model behind the search form about `backend\models\Documenttype`.
 */
class DocumenttypeSearch extends Documenttype
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DocumentTypeId', 'TopicTypeId'], 'integer'],
            [['Name', 'Color'], 'safe'],
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
        $query = Documenttype::find();

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
            'DocumentTypeId' => $this->DocumentTypeId,
            'TopicTypeId' => $this->TopicTypeId,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Color', $this->Color]);

        return $dataProvider;
    }
}
