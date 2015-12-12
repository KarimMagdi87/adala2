<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "documenttype".
 *
 * @property integer $DocumentTypeId
 * @property string $Name
 * @property integer $TopicTypeId
 * @property string $Color
 *
 * @property Document[] $documents
 * @property Topictype $topicType
 * @property Documenttypebasetopic[] $documenttypebasetopics
 * @property Basetopic[] $baseTopics
 * @property Documenttypetopic[] $documenttypetopics
 * @property Topic[] $topics
 */
class Documenttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documenttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DocumentTypeId', 'Name', 'TopicTypeId'], 'required'],
            [['DocumentTypeId', 'TopicTypeId'], 'integer'],
            [['Name'], 'string', 'max' => 50],
            [['Color'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DocumentTypeId' => 'Document Type ID',
            'Name' => 'Name',
            'TopicTypeId' => 'Topic Type ID',
            'Color' => 'Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['DocumentTypeId' => 'DocumentTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopicType()
    {
        return $this->hasOne(Topictype::className(), ['TopicTypeId' => 'TopicTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumenttypebasetopics()
    {
        return $this->hasMany(Documenttypebasetopic::className(), ['DocumentTypeId' => 'DocumentTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaseTopics()
    {
        return $this->hasMany(Basetopic::className(), ['BaseTopicId' => 'BaseTopicId'])->viaTable('documenttypebasetopic', ['DocumentTypeId' => 'DocumentTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumenttypetopics()
    {
        return $this->hasMany(Documenttypetopic::className(), ['DocumentTypeId' => 'DocumentTypeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasMany(Topic::className(), ['TopicId' => 'TopicId'])->viaTable('documenttypetopic', ['DocumentTypeId' => 'DocumentTypeId']);
    }
}
