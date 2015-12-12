<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "topic".
 *
 * @property integer $TopicId
 * @property integer $TopicTypeId
 * @property string $Name
 * @property integer $ParentTopicId
 * @property integer $TopicOrder
 * @property integer $OldId
 * @property integer $DocumentCount
 *
 * @property Document[] $documents
 * @property Documenttypetopic[] $documenttypetopics
 * @property Documenttype[] $documentTypes
 * @property Topic $parentTopic
 * @property Topic[] $topics
 * @property Topictype $topicType
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TopicTypeId', 'Name'], 'required'],
            [['TopicTypeId', 'ParentTopicId', 'TopicOrder', 'OldId', 'DocumentCount'], 'integer'],
            [['Name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TopicId' => 'Topic ID',
            'TopicTypeId' => 'Topic Type ID',
            'Name' => 'Name',
            'ParentTopicId' => 'Parent Topic ID',
            'TopicOrder' => 'Topic Order',
            'OldId' => 'Old ID',
            'DocumentCount' => 'Document Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['TopicId' => 'TopicId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumenttypetopics()
    {
        return $this->hasMany(Documenttypetopic::className(), ['TopicId' => 'TopicId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentTypes()
    {
        return $this->hasMany(Documenttype::className(), ['DocumentTypeId' => 'DocumentTypeId'])->viaTable('documenttypetopic', ['TopicId' => 'TopicId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentTopic()
    {
        return $this->hasOne(Topic::className(), ['TopicId' => 'ParentTopicId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['ParentTopicId' => 'TopicId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicType()
    {
        return $this->hasOne(Topictype::className(), ['TopicTypeId' => 'TopicTypeId']);
    }
}
