<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Document;

/**
 * DocumentSearch represents the model behind the search form about `backend\models\Document`.
 */
class DocumentSearch extends Document
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DocumentId', 'TopicId', 'DocumentTypeId', 'ParentDocumentId', 'Year', 'EditionNumber', 'DocumentOrder', 'OldId', 'IndexId'], 'integer'],
            [['Note', 'Publication', 'Date', 'Intro', 'Summary', 'Text', 'Title', 'Number', 'HTML'], 'safe'],
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
        $query = Document::find();

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
            'DocumentId' => $this->DocumentId,
            'TopicId' => $this->TopicId,
            'DocumentTypeId' => $this->DocumentTypeId,
            'ParentDocumentId' => $this->ParentDocumentId,
            'Year' => $this->Year,
            'Date' => $this->Date,
            'EditionNumber' => $this->EditionNumber,
            'DocumentOrder' => $this->DocumentOrder,
            'OldId' => $this->OldId,
            'IndexId' => $this->IndexId,
        ]);

        $query->andFilterWhere(['like', 'Note', $this->Note])
            ->andFilterWhere(['like', 'Publication', $this->Publication])
            ->andFilterWhere(['like', 'Intro', $this->Intro])
            ->andFilterWhere(['like', 'Summary', $this->Summary])
            ->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Number', $this->Number])
            ->andFilterWhere(['like', 'HTML', $this->HTML]);

        return $dataProvider;
    }
}
